# Display User Roles and Capabilities Plugin

This is a WordPress plugin that provides functionality to display user roles and their capabilities. It also adds a help link to the plugin page.

## Functions

The plugin contains two main functions:

1. `jlmr_agregar_enlace_ayuda_display_user_roles_and_capabilities($links, $file)`: This function adds a help link to the plugin page. It first checks if we are in the correct plugin before adding the link. The help link URL is constructed and added to the array of links. The function returns the updated links array.

2. `jlmr_display_user_roles_and_capabilities()`: This function is used to display user roles and their capabilities. It starts an output buffer and retrieves all user roles.

## Usage

To use this plugin, simply install it in your WordPress site and activate it. The user roles and their capabilities will be displayed, and a help link will be added to the plugin page.

## Note

This plugin is still under development. More features will be added in the future.

## Contribution

Contributions are welcome. Please make sure to read the contributing guide before making a pull request.

## License

This project is licensed under the MIT License. See the LICENSE file for details.