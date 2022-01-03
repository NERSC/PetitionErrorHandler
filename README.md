This plugin uses the currently authenticated user identifier (ie: the
contents of `$REMOTE_USER`) to look for petitions in an error state and then
render a user facing error message.

# Customizing the Plugin

The Plugin can be customized via the layout file (which controls the look and
feel of rendered pages) and the view file (which controls the content of a
specific page). (Currently there is only one page rendered by the plugin, so
there is not much of a distinction.)

* Layout: `PetitionErrorHandler/View/Layouts/nersc.ctp`
* View: `PetitionErrorHandler/View/PetitionErrorHandlers/lookup.ctp`

## Examining Petition State

The view receives an array of all petitions within the requested CO ID for the
authenticated user identifier, grouped by status. By walking the array, it is
possible to implement custom rendering logic. This array is available in the
view variable `$vv_petitions`.

The user's name is available to the view in `$name`, but is not currently used.

# Installation

The plugin should be placed in the `local/Plugin` directory as per the
[standard instructions](https://spaces.at.internet2.edu/display/COmanage/Installing+and+Enabling+Registry+Plugins). There is currently no database
schema for the plugin, so it is not necessary to run the `cake database` step.

Once installed, the plugin is available to all registered COs.

# Using the Plugin

Redirect the user to (replacing the server name and CO ID as needed)

https://comanage-server/registry/petition_error_handler/petition_error_handlers/lookup/co:2

The user will need to be authenticated, however this may be transparent if they
were redirected from an authenticated enrollment flow.

# See Also

* [PMO 950](https://pmo.sphericalcowgroup.com/projects/lbl-nersc/work_packages/950)