# WordPress Custom Theme Development

A learning-focused WordPress installation featuring a custom theme built with modern OOP principles and advanced WordPress development techniques.

## About

This repository contains a complete WordPress installation (excluding core WP files) with a custom theme developed for educational purposes. The project explores advanced WordPress theme development concepts including:

- Object-Oriented Programming (OOP) architecture
- Modern PHP practices and design patterns
- Custom post types and fields
- Advanced menu systems and navigation
- Theme customization API
- Performance optimization techniques

## Structure

```
wp-content/
├── themes/
│   └── custom-theme/     # Main custom theme
├── plugins/              # Custom plugins (if any)
└── uploads/             # Media files
```

## Theme Features

- **OOP Architecture**: Clean, maintainable code structure using namespaces and classes
- **Singleton Pattern**: Efficient resource management
- **Custom Menus**: Dynamic menu rendering with dropdown support
- **Modern Workflow**: Tailwind CSS integration and modern development practices

## Purpose

This is an educational project designed to deepen understanding of WordPress theme development. Not intended for production use.

## Requirements

- PHP 8.0+
- WordPress 6.0+
- Node.js (for asset compilation)

## Setup

1. Clone this repository into your local WordPress installation
2. Copy the `wp-content` folder to your WordPress root
3. Configure your `wp-config.php` file
4. Navigate to `wp-content/themes/novatech` and run:
   ```bash
   npm i && npm run build
   ```
5. Install and activate the custom theme

---

*This project is for learning purposes and demonstrates advanced WordPress development concepts.*