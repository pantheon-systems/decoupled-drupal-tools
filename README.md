# Decoupled Drupal Tools

Contains the following module:

- pantheon_decoupled

and the following install profiles:

- pantheon_decoupled
- pantheon_decoupled_umami_demo

## Adding Dependencies

When new dependencies are added to any of the profiles/modules, run the following
command and commit the result:

vendor/bin/monorepo-builder merge

This combines dependencies for all profiles and modules so this project can be
installed as a single composer dependency for local development purposes.
test
