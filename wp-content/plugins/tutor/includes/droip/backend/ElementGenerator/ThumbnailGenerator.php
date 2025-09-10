<?php

/**
 * Preview script for html markup generator
 *
 * @package tutor-droip-elements
 */

namespace TutorLMSDroip\ElementGenerator;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Class ThumbnailGenerator
 * This class is used to define all helper functions.
 */
trait ThumbnailGenerator {

	/**
	 * Generate course meta markup
	 *
	 * @return string
	 */
	private function generate_course_thumbnail_markup() {
		$settings       = isset( $this->element['properties']['settings'] ) ? $this->element['properties']['settings'] : array();
		$thumbnail_type = isset( $settings['thumbnail_type'] ) ? $settings['thumbnail_type'] : 'video';
		$course_id      = isset( $this->options['post'] ) ? $this->options['post']->ID : get_the_ID();
		$thumbnail      = $this->get_course_thumbnail( $thumbnail_type, true, $course_id, $this->options );
		if ( $thumbnail['type'] === 'video' ) {
			if ( $thumbnail['source'] === 'html5' || $thumbnail['source'] === 'external_url' ) {
				return "<video playsinline controls $this->attributes><source src=" . $thumbnail['src'] . " type='video/mp4'></video>";
			}
			if ( $thumbnail['source'] === 'youtube' ) {
				return "<iframe $this->attributes frameborder='0' allowfullscreen allowtransparency allow='autoplay' src='https://www.youtube.com/embed/" . $thumbnail['id'] . "'></iframe>";
			}
			if ( $thumbnail['source'] === 'vimeo' ) {
				return "<iframe $this->attributes frameborder='0' allowfullscreen allowtransparency allow='autoplay' src='https://player.vimeo.com/video/" . $thumbnail['id'] . "'></iframe>";
			}
			if ( $thumbnail['source'] === 'embedded' ) {
				$firstTagEnd  = strpos( $thumbnail['src'], '>' );
				$modifiedHtml = substr_replace( $thumbnail['src'], ' ' . $this->attributes, $firstTagEnd, 0 );
				return $modifiedHtml;
			}
		}
		return "<img $this->attributes src=" . $thumbnail['src'] . ' />';
	}


	public function get_course_thumbnail( $thumbnail_type, $secondary_show, $course_id, $options = array() ) {
		switch ( $thumbnail_type ) {
			case 'image': {
					$tutor_course_img = get_tutor_course_thumbnail_src( 'post-thumbnail', $course_id );
				if ( $tutor_course_img ) {
					return array(
						'type' => 'image',
						'src'  => $tutor_course_img,
					);
				}
				if ( $secondary_show ) {
					return $this->get_course_thumbnail( 'video', false, $course_id, $options );
				}
				return $this->get_course_thumbnail( 'default', false, $course_id, $options );
			}
			case 'video': {
					$video_info = tutor_utils()->get_video_info( $course_id );
					$source_key = is_object( $video_info ) ? 'source_' . $video_info->source : null;
				if ( $source_key ) {
					if ( $video_info->source === 'html5' || $video_info->source === 'external_url' ) {
						return array(
							'type'   => 'video',
							'src'    => $video_info->$source_key,
							'source' => $video_info->source,
						);
					} elseif ( $video_info->source === 'youtube' ) {
						$youtube_video_id = tutor_utils()->get_youtube_video_id( tutor_utils()->avalue_dot( 'source_youtube', $video_info ) );
						return array(
							'type'   => 'video',
							'src'    => $video_info->$source_key,
							'source' => $video_info->source,
							'id'     => $youtube_video_id,
						);
					} elseif ( $video_info->source === 'vimeo' ) {
						$video_url = tutor_utils()->avalue_dot( 'source_vimeo', $video_info );
						$video_id  = '';
						if ( preg_match( '%^https?:\/\/(?:www\.|player\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)(?:[?]?.*)$%im', $video_url, $match ) ) {
							if ( isset( $match[3] ) ) {
								$video_id = $match[3];
							}
						}
						return array(
							'type'   => 'video',
							'src'    => $video_info->$source_key,
							'source' => $video_info->source,
							'id'     => $video_id,
						);
					} elseif ( $video_info->source === 'embedded' ) {
						return array(
							'type'   => 'video',
							'src'    => $video_info->$source_key,
							'source' => $video_info->source,
						);
					}
				}
				if ( $secondary_show ) {
					return $this->get_course_thumbnail( 'image', false, $course_id, $options );
				}
				return $this->get_course_thumbnail( 'default', false, $course_id, $options );
			}
			case 'default': {
					return array(
						'type' => 'default',
						'src'  => tutor_placeholder_img_src(),
					);
			}
		}
	}
}
