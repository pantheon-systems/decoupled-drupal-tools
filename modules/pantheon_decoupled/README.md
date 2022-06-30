# Pantheon Decoupled

Recommended configuration for Decoupled sites on Pantheon.

## pantheon_decoupled

Installs recommended dependencies for a Decoupled Drupal backend, and configures
an example preview site and oAuth consumer for use with the Decoupled Preview.

### Note
-  The `$settings['file_private_path']` configuration needs to be set in the settings.php for the Drupal Site.
- The `minimum-stability` should be set to `alpha` in the Projects root `composer.json` file.

## pantheon_decoupled_example

`pantheon_decoupled` also includes a sub-module named `pantheon_decoupled_example`. This module adds limited content integrations. Enabling this module will also enable the media and media_library modules. This will also add media fields (articles only) and enables pathauto for the article and basic page content types.
