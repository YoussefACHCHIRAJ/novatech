<?php

/**
 * Preview script for html markup generator
 *
 * @package tutor-droip-elements
 */

namespace TutorLMSDroip\ElementGenerator;

use Droip\HelperFunctions;
use Tutor\Models\CourseModel;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Class CourseMetaGenerator
 * This class is used to define all helper functions.
 */
trait CourseMetaGenerator {

	/**
	 * Generate course meta markup
	 *
	 * @return string
	 */
	private function generate_course_meta_markup() {
		$settings      = isset( $this->element['properties']['settings'] ) ? $this->element['properties']['settings'] : array();
		$meta_type     = isset( $settings['course_meta_type'] ) ? $settings['course_meta_type'] : 'default';
		$course_id     = isset( $this->options['post'] ) ? $this->options['post']->ID : get_the_ID();
		$is_instructor = isset( $this->options['itemType'] ) && $this->options['itemType'] !== 'post';
		$meta          = $this->get_course_meta( $meta_type, $course_id, $this->options, $settings, $is_instructor );
		$meta          = $this->wrap_if_meta_has_label( $meta, $settings );

		if ( $meta_type === 'sidebar_meta' ) {
			$html = '';
			foreach ( $meta as $key => $single_meta ) {
				if ( ! $single_meta['value'] ) {
					continue;
				}
				$options['sidebar_meta'] = $single_meta;
				if ( ! isset( $options['sidebar_meta'] ) ) {
					return '';
				}
				$sidebar_meta = $options['sidebar_meta'];
				$value        = $sidebar_meta['value'];
				$html        .= "<span $this->attributes>$value</span>";
			}
			return "<div $this->attributes>$html</div>";
		} elseif ( $meta_type === 'stars' || $meta_type === 'instructor_stars' ) {
			$this->options['star_type'] = $meta_type;
			return "<div $this->attributes>" . $this->generate_child_elements() . '</div>';
		} elseif ( $meta_type === 'active_stars' || $meta_type === 'inactive_stars' || $meta_type === 'instructor_active_stars' || $meta_type === 'instructor_inactive_stars' ) {
			$html = '';
			for ( $i = 1; $i <= round( (int) $meta ); $i++ ) {
				$html .= $this->generate_common_element();
			}
			$this->generate_common_element();
			return $html;
		} elseif ( str_contains( $meta_type, '_star_progress_percentage' ) || $meta_type === 'course_progress_bar' ) {
			return "<div $this->attributes style='height:100%;width:$meta%;'>" . $this->generate_child_elements() . '</div>';
		} elseif (
			$meta_type === 'course_benefits' ||
			$meta_type === 'course_materials' ||
			$meta_type === 'course_requirements' ||
			$meta_type === 'course_target_audience'
		) {
			$html = '';
			foreach ( $meta as $single_meta ) {
				$this->options['course_meta_child_content'] = $single_meta;
				$html                                      .= $this->generate_child_elements();
			}
			return "<div $this->attributes>" . $html . '</div>';
		} elseif (
			$meta_type === 'single_benefit' ||
			$meta_type === 'single_material' ||
			$meta_type === 'single_requirement' ||
			$meta_type === 'single_target_audience' ||
			$meta_type === 'single_numeric_meta'
		) {
			$content = $this->options['course_meta_child_content'];
			unset( $this->options['course_meta_child_content'] );
			return "<span $this->attributes>" . $content . '</span>';
		} elseif ( $meta_type === 'instructor_image' || $meta_type === 'comment_author_image' ) {
			return "<img $this->attributes src='" . $meta['src'] . "' alt='" . $meta['alt'] . "'/>";
		} else {
			return "<span $this->attributes>$meta</span>";
		}
	}

	public function wrap_if_meta_has_label( $meta, $settings ) {
		$label = isset( $settings['label'] ) ? $settings['label'] : false;
		if ( $label ) {
			$singular = isset( $settings['singular'] ) ? $settings['singular'] : '';
			$plural   = isset( $settings['plural'] ) ? $settings['plural'] : '';
			$suffix   = $meta > 1 ? $plural : $singular;
			$meta     = "{$meta} ";
			$meta     = $meta . $suffix;
		}
		return $meta;
	}

	public static function get_course_meta( $meta_type, $course_id, $options = array(), $settings = array(), $is_instructor = false ) {
		$current_user_id = get_current_user_id();
		switch ( $meta_type ) {
			case 'course_level':
				$level_text = get_tutor_course_level( $course_id );
				return $level_text;
			case 'enroll_count':
				$count_value = tutor_utils()->count_enrolled_users_by_course( $course_id );
				return $count_value;
			case 'course_duration':
				$duration = get_post_meta( $course_id, '_course_duration', true );
				if ( ! $duration ) {
					return '';
				}
				$hour        = (int) $duration['hours'] ?? '0';
				$hour_text   = $hour > 1 ? 'hours' : 'hour';
				$minute      = (int) $duration['minutes'] ?? '0';
				$minute_text = $minute > 1 ? 'minutes' : 'minute';
				return "{$hour} {$hour_text} {$minute} {$minute_text}";
			case 'last_updated':
				$date   = get_the_modified_date( get_option( 'date_format' ), $course_id );
				$format = isset( $settings['date_format'] ) ? $settings['date_format'] : 'M j, Y';
				$date   = self::format_date( $date, $format );
				return $date;
			case 'course_price':
				$course_price  = tutor_utils()->get_raw_course_price( $course_id );
				$regular_price = $course_price->regular_price == 0 ? '' : $course_price->regular_price;
				if ( $regular_price == '' ) {
					return '';
				}
				return tutor_get_formatted_price( $regular_price );
			case 'sale_price':
				$course_price = tutor_utils()->get_raw_course_price( $course_id );
				$sale_price   = $course_price->sale_price == 0 ? '' : $course_price->sale_price;
				if ( $sale_price == '' ) {
					return '';
				}
				return tutor_get_formatted_price( $sale_price );
			case 'sidebar_meta':
				$sidebar_metas = apply_filters( 'tutor/course/single/sidebar/metadata', array(), $course_id );
				if ( isset( $sidebar_metas ) ) {
					return $sidebar_metas;
				}

				return array();
			case 'comment_author':
				if ( ! isset( $options['comment'] ) ) {
					return '';
				}

				$comments = json_decode( json_encode( $options['comment'] ), true );
				return $comments['display_name'] ? $comments['display_name'] : $comments['comment_author'];
			case 'comment_author_image':
				if ( ! isset( $options['comment'] ) ) {
					return array(
						'src' => '',
						'alt' => ''
					);
				}
				$comments  = json_decode( json_encode( $options['comment'] ), true );
				$image_url = array(
					'src' => get_avatar_url( $comments['user_id'] ),
					'alt' => $comments['display_name'],
				);
				return $image_url;
			case 'comment_content':
			case 'comment_date':
			case 'rating':
				if ( ! isset( $options['comment'] ) ) {
					return '';
				}
				$comments = json_decode( json_encode( $options['comment'] ), true );
				if ( $meta_type === 'comment_date' ) {
					$format                   = isset( $settings['date_format'] ) ? $settings['date_format'] : 'M j, Y';
					$comments['comment_date'] = self::format_date( $comments['comment_date'], $format );
				}
				return $comments[ $meta_type ];
			case 'active_stars':
			case 'inactive_stars':
				$comments = null;
				if ( isset( $options['comment'] ) ) {
					$comments = json_decode( json_encode( $options['comment'] ), true );
					$stars    = (int) $comments['rating'];
					return $meta_type === 'active_stars' ? $stars : 5 - $stars;
				}
				$comments = self::get_course_reviews( $course_id );
				if ( count( $comments ) === 0 ) {
					return $meta_type === 'active_stars' ? 0 : 5;
				}

				$rating = 0;
				foreach ( $comments as $comment ) {
					$rating += $comment->rating;
				}
				$average = (int) round( $rating / count( $comments ) );
				return $meta_type === 'active_stars' ? $average : 5 - $average;
			case 'instructor_active_stars':
			case 'instructor_inactive_stars':
				$user_id = $course_id;
				if ( isset( $options['user'] ) && isset( $options['user']['ID'] ) ) {
					$user_id = $options['user']['ID'];
				}
				$instructor_rating = tutor_utils()->get_instructor_ratings( $user_id );
				$rating            = (int) round( $instructor_rating->rating_avg );
				return $meta_type === 'instructor_active_stars' ? $rating : 5 - $rating;
			case 'total_ratings':
				$comments = self::get_course_reviews( $course_id );
				$count    = count( $comments );
				return $count;
			case 'average_rating':
				$comments = self::get_course_reviews( $course_id );
				if ( count( $comments ) == 0 ) {
					return 0;
				}

				$rating = 0;
				foreach ( $comments as $comment ) {
					$rating += $comment->rating;
				}
				$average = number_format( $rating / count( $comments ), 1 );
				return $average;
			case 'rating_1_star_count':
				$comments            = self::get_course_reviews( $course_id );
				$rating_1_star_count = 0;
				foreach ( $comments as $comment ) {
					if ( $comment->rating == 1 ) {
						++$rating_1_star_count;
					}
				}
				return $rating_1_star_count;
			case 'rating_2_star_count':
				$comments            = self::get_course_reviews( $course_id );
				$rating_2_star_count = 0;
				foreach ( $comments as $comment ) {
					if ( $comment->rating == 2 ) {
						++$rating_2_star_count;
					}
				}
				return $rating_2_star_count;
			case 'rating_3_star_count':
				$comments            = self::get_course_reviews( $course_id );
				$rating_3_star_count = 0;
				foreach ( $comments as $comment ) {
					if ( $comment->rating == 3 ) {
						++$rating_3_star_count;
					}
				}
				return $rating_3_star_count;
			case 'rating_4_star_count':
				$comments            = self::get_course_reviews( $course_id );
				$rating_4_star_count = 0;
				foreach ( $comments as $comment ) {
					if ( $comment->rating == 4 ) {
						++$rating_4_star_count;
					}
				}
				return $rating_4_star_count;
			case 'rating_5_star_count':
				$comments            = self::get_course_reviews( $course_id );
				$rating_5_star_count = 0;
				foreach ( $comments as $comment ) {
					if ( $comment->rating == 5 ) {
						++$rating_5_star_count;
					}
				}
				return $rating_5_star_count;
			case 'max_rating_count':
				$comments         = self::get_course_reviews( $course_id );
				$counts           = array();
				$counts[]         = self::get_course_meta( 'rating_1_star_count', $course_id, $options, $settings );
				$counts[]         = self::get_course_meta( 'rating_2_star_count', $course_id, $options, $settings );
				$counts[]         = self::get_course_meta( 'rating_3_star_count', $course_id, $options, $settings );
				$counts[]         = self::get_course_meta( 'rating_4_star_count', $course_id, $options, $settings );
				$counts[]         = self::get_course_meta( 'rating_5_star_count', $course_id, $options, $settings );
				$max_rating_count = 0;
				foreach ( $counts as $count ) {
					if ( $count > $max_rating_count ) {
						$max_rating_count = $count;
					}
				}
				return $max_rating_count;
			case '1_star_progress_percentage':
			case '2_star_progress_percentage':
			case '3_star_progress_percentage':
			case '4_star_progress_percentage':
			case '5_star_progress_percentage':
			case 'avg_star_progress_percentage':
				$rating = str_replace( '_star_progress_percentage', '', $meta_type );
				if ( $rating === 'avg' ) {
					$this_count = self::get_course_meta( 'average_rating', $course_id, $options, $settings );
					$max_count  = 5;
					return round( ( $this_count / $max_count ) * 100 );
				}

				$max_count = self::get_course_meta( 'max_rating_count', $course_id, $options, $settings );
				if ( $max_count == 0 ) {
					return 0;
				}

				$this_count = self::get_course_meta( 'rating_' . $rating . '_star_count', $course_id, $options, $settings );
				$percentage = round( ( $this_count / $max_count ) * 100 );
				return $percentage;
			case 'enroll_date':
				$is_enrolled = tutor_utils()->is_enrolled( $course_id );
				$post_date   = is_object( $is_enrolled ) && isset( $is_enrolled->post_date ) ? $is_enrolled->post_date : '';
				$post_date   = tutor_i18n_get_formated_date( $post_date, get_option( 'date_format' ) );
				$format      = isset( $settings['date_format'] ) ? $settings['date_format'] : 'M j, Y';
				$post_date   = self::format_date( $post_date, $format );
				return $post_date;
			case 'progress_percent':
				$is_enrolled = tutor_utils()->is_enrolled( $course_id );
				if ( ! $is_enrolled ) {
					return 0;
				}
				$course_progress   = tutor_utils()->get_course_completed_percent( $course_id, $current_user_id, true );
				$completed_percent = (int) $course_progress['completed_percent'];
				return $completed_percent;
			case 'course_progress_bar':
				return self::get_course_meta( 'progress_percent', $course_id, $options, $settings );
			case 'completed_steps':
				$is_enrolled = tutor_utils()->is_enrolled( $course_id );
				if ( ! $is_enrolled ) {
					return '';
				}
				$course_progress = tutor_utils()->get_course_completed_percent( $course_id, $current_user_id, true );
				return $course_progress['completed_count'];
			case 'total_steps':
				$is_enrolled = tutor_utils()->is_enrolled( $course_id );
				if ( ! $is_enrolled ) {
					return '';
				}
				$course_progress = tutor_utils()->get_course_completed_percent( $course_id, $current_user_id, true );
				return $course_progress['total_count'];

			case 'lesson_duration':
				$material = array();
				if ( isset( $options['material'] ) ) {
					$material = (object) $options['material'];
				} else {
					$material = $options['post'];
				}
				$duration = self::get_material_duration( $material );
				return $duration;
			case 'question_author':
				$question = (object) $options['comment'];
				if ( ! isset( $question ) ) {
					return '';
				}

				return $question->display_name ? $question->display_name : $question->comment_author;
			case 'question_content':
				$question = (object) $options['comment'];
				if ( ! isset( $question ) ) {
					return '';
				}

				return $question->comment_content;
			case 'question_date':
				$question = (object) $options['comment'];
				if ( ! isset( $question ) ) {
					return '';
				}
				$format = isset( $settings['date_format'] ) ? $settings['date_format'] : 'M j, Y';
				$date   = self::format_date( $question->comment_date, $format );
				return $date;
			case 'announcement_title':
				$announcement = (object) $options['announcement'];
				if ( ! isset( $announcement ) ) {
					return '';
				}

				return $announcement->post_title;
			case 'announcement_content':
				$announcement = (object) $options['announcement'];
				if ( ! isset( $announcement ) ) {
					return '';
				}

				return $announcement->post_content;
			case 'announcement_author':
				$announcement = (object) $options['announcement'];
				if ( ! isset( $announcement ) ) {
					return '';
				}

				$author_display_name = get_the_author_meta( 'display_name', $announcement->post_author );
				return $author_display_name;
			case 'announcement_date':
				$announcement = (object) $options['announcement'];
				if ( ! isset( $announcement ) ) {
					return '';
				}
				$format = isset( $settings['date_format'] ) ? $settings['date_format'] : 'M j, Y';
				$date   = self::format_date( $announcement->post_date, $format );
				return $date;
			case 'resource_count':
				$resources = tutor_utils()->get_attachments( $course_id );
				if ( empty( $resources ) ) {
					return 0;
				}

				$resource_count = count( $resources );
				return $resource_count;
			case 'lesson_count':
			case 'quiz_count':
			case 'assignments_count':
				$obj = HelperFunctions::get_posts(
					array(
						'name'          => 'topics',
						'inherit'       => true,
						'post_parent'   => $course_id,
						'item_per_page' => -1,
					)
				);
				if ( empty( $obj['data'] ) ) {
					return 0;
				}

				$count = 0;
				foreach ( $obj['data'] as $topic ) {
					$topic_id       = $topic->ID;
					$topic_contents = self::get_topic_meta( $topic_id, $meta_type );
					$count         += count( $topic_contents );
				}
				return $count;
			case 'resource_title':
				$resource = (object) $options['resources'];
				if ( ! isset( $resource ) ) {
					return '';
				}

				return $resource->name;
			case 'resource_url':
				$resource = (object) $options['resources'];
				if ( ! isset( $resource ) ) {
					return '';
				}

				return $resource->url;
			case 'resource_size':
				$resource = (object) $options['resources'];
				if ( ! isset( $resource ) ) {
					return '';
				}

				return $resource->size;
			case 'course_benefits':
				$course_benefits = tutor_course_benefits( $course_id );
				if ( empty( $course_benefits ) ) {
					return array();
				}
				return $course_benefits;
			case 'course_materials':
				$materials = tutor_course_material_includes( $course_id );
				if ( empty( $materials ) ) {
					return array();
				}
				return $materials;
			case 'course_requirements':
				$course_requirements = tutor_course_requirements( $course_id );
				if ( empty( $course_requirements ) ) {
					return array();
				}
				return $course_requirements;
			case 'course_target_audience':
				$course_target_audience = tutor_course_target_audience( $course_id );
				if ( empty( $course_target_audience ) ) {
					return array();
				}
				return $course_target_audience;
			case 'instructor_course_count':
				$user_id = $course_id;
				if ( isset( $options['user'] ) && isset( $options['user']['ID'] ) ) {
					$user_id = $options['user']['ID'];
				}
				$course_count = CourseModel::get_course_count_by_instructor( $user_id );
				return $course_count;
			case 'instructor_student_count':
				$user_id = $course_id;
				if ( isset( $options['user'] ) && isset( $options['user']['ID'] ) ) {
					$user_id = $options['user']['ID'];
				}
				$student_count = tutor_utils()->get_total_students_by_instructor( $user_id );
				return $student_count;
			case 'instructor_rating':
				$user_id = $course_id;
				if ( isset( $options['user'] ) && isset( $options['user']['ID'] ) ) {
					$user_id = $options['user']['ID'];
				}
				$instructor_rating = tutor_utils()->get_instructor_ratings( $user_id );
				$rating            = $instructor_rating->rating_avg;
				return number_format( $rating, 1 );
			case 'instructor_rating_count':
				$user_id = $course_id;
				if ( isset( $options['user'] ) && isset( $options['user']['ID'] ) ) {
					$user_id = $options['user']['ID'];
				}
				$instructor_rating = tutor_utils()->get_instructor_ratings( $user_id );
				return $instructor_rating->rating_count;
			case 'instructor_name':
				$user_id = $course_id;
				if ( ! $is_instructor && $course_id ) {
					$post    = get_post( $course_id );
					$user_id = $post->post_author;
				}
				$user = tutor_utils()->get_tutor_user( $user_id );
				if ( ! $user ) {
					return '';
				}
				return $user->display_name;
			case 'instructor_email':
				$user_id = $course_id;
				if ( ! $is_instructor && $course_id ) {
					$post    = get_post( $course_id );
					$user_id = $post->post_author;
				}
				$user = tutor_utils()->get_tutor_user( $user_id );
				if ( ! $user ) {
					return '';
				}
				return $user->user_email;
			case 'instructor_image':
				$user_id = $course_id;
				if ( ! $is_instructor && $course_id ) {
					$post    = get_post( $course_id );
					$user_id = $post->post_author;
				}
				$user = tutor_utils()->get_tutor_user( $user_id );
				if ( ! $user ) {
					return array(
						'src' => '',
						'alt' => '',
					);
				}
				$image_url = array(
					'src' => get_avatar_url( $user->ID ),
					'alt' => $user->display_name,
				);
				return $image_url;
			case 'instructor_bio':
				$user_id = $course_id;
				if ( ! $is_instructor && $course_id ) {
					$post    = get_post( $course_id );
					$user_id = $post->post_author;
				}
				$user = tutor_utils()->get_tutor_user( $user_id );
				if ( ! $user ) {
					return '';
				}
				$instructor_bio = $user->tutor_profile_bio;
				return $instructor_bio;
			case 'topic_duration':
				$topic_contents = tutor_utils()->get_course_contents_by_topic( $course_id, -1 );
				if ( ! isset( $topic_contents ) || ! isset( $topic_contents->posts ) ) {
					return array();
				}
				$topic_contents = $topic_contents->posts;
				$hours_sum      = 0;
				$minutes_sum    = 0;
				$seconds_sum    = 0;
				foreach ( $topic_contents as $content ) {
					$duration = self::get_material_duration( $content );
					if ( ! $duration ) {
						continue;
					}

					$duration = explode( ':', $duration );
					$hours    = count( $duration ) === 3 ? (int) $duration[0] : 0;
					$minutes  = count( $duration ) >= 2 ? (int) $duration[ count( $duration ) - 2 ] : 0;
					$seconds  = $duration[ count( $duration ) - 1 ];

					$hours_sum   += (int) $hours;
					$minutes_sum += (int) $minutes;
					$seconds_sum += (int) $seconds;
				}
				$hours   += (int) ( $minutes_sum / 60 );
				$minutes  = (int) ( $minutes_sum % 60 );
				$minutes += (int) ( $seconds_sum / 60 );
				$seconds  = (int) ( $seconds_sum % 60 );

				$duration = '';
				if ( $hours > 0 ) {
					$duration .= $hours . ' hr ';
				}

				if ( $minutes > 0 ) {
					$duration .= $minutes . ' min ';
				}

				// if ($seconds > 0) $duration .= $seconds . ' sec';
				$duration = trim( $duration );
				return $duration;
			case 'topic_lesson_count':
			case 'topic_quiz_count':
			case 'topic_assignments_count':
				$count = 0;
				$item  = self::get_topic_meta( $course_id, str_replace( 'topic_', '', $meta_type ) );
				if ( is_array( $item ) ) {
					$count = count( $item );
				}

				return $count;

			default:
				return '';
		}
	}

	/**
	 * Get Tutor Reviews
	 *
	 * @return array
	 */
	public static function get_course_reviews( $course_id, $options = array() ) {
		$per_page        = tutor_utils()->get_option( 'pagination_per_page', 10 );
		$offset          = 0; // TODO: need to check tutor functionality.
		$current_user_id = get_current_user_id();
		$reviews         = tutor_utils()->get_course_reviews( $course_id, $offset, $per_page, false, array( 'approved' ), $current_user_id );
		return $reviews;
	}

	public static function get_topic_meta( $topic_id, $meta_type ) {
		$topic_contents = tutor_utils()->get_course_contents_by_topic( $topic_id, -1 );
		if ( ! isset( $topic_contents ) || ! isset( $topic_contents->posts ) ) {
			return array();
		}
		$topic_contents = $topic_contents->posts;
		$topic_contents = array_filter(
			$topic_contents,
			function ( $content ) use ( $meta_type ) {
				$type = str_replace( '_count', '', $meta_type );
				$type = $type === 'lesson' ? $type : 'tutor_' . $type;
				return $content->post_type === $type;
			}
		);
		return $topic_contents;
	}

	public static function get_material_duration( $material ) {
		if ( $material->post_type !== 'lesson' ) {
			return '';
		}
		$video = tutor_utils()->get_video_info( $material->ID );
		if ( ! $video || ! $video->playtime ) {
			return '';
		}
		$duration = tutor_utils()->get_optimized_duration( $video->playtime );
		return $duration;
	}

	public static function format_date( $date, $format ) {
		if ( $date && $format ) {
			$date = new \DateTime( $date );
			$date = $date->format( $format );
			return $date;
		}
		return $date;
	}
}
