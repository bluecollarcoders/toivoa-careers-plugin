/**
 * Job Details Sidebar Panel
 */

import { registerPlugin }               from '@wordpress/plugins';
import { PluginDocumentSettingPanel }   from '@wordpress/edit-post';
import { TextControl }                  from '@wordpress/components';
import { useEntityProp }                from '@wordpress/core-data';
import { __ }                           from '@wordpress/i18n';

function JobDetailsPanel() {
    // Pull in all meta for the current Job post.
    const [ meta, setMeta ] = useEntityProp(
        'postType',
        'job',
        'meta'
    );

    // If still loading…
    if ( meta === undefined ) {
        return null;
    }

    return (
        <PluginDocumentSettingPanel
            name="toivoa-job-details"
            title={ __( 'Job Details', 'toivoa-careers' ) }
            className="toivoa-job-details-panel"
        >
            <TextControl
                label={ __( 'Position Title', 'toivoa-careers' ) }
                value={ meta.position_title || '' }
                onChange={ ( value ) =>
                    setMeta( { ...meta, position_title: value } )
                }
            />
            <TextControl
                label={ __( 'Location', 'toivoa-careers' ) }
                value={ meta.location || '' }
                onChange={ ( value ) =>
                    setMeta( { ...meta, location: value } )
                }
            />
            <TextControl
                label={ __( 'Position Type', 'toivoa-careers' ) }
                value={ meta.position_type || '' }
                onChange={ ( value ) =>
                    setMeta( { ...meta, position_type: value } )
                }
            />
            <TextControl
                label={ __( 'Reports To', 'toivoa-careers' ) }
                value={ meta.reports_to || '' }
                onChange={ ( value ) =>
                    setMeta( { ...meta, reports_to: value } )
                }
            />
        </PluginDocumentSettingPanel>
    );
}

registerPlugin( 'toivoa-job-details-sidebar', {
    render: JobDetailsPanel,
    icon:    null,
} );
