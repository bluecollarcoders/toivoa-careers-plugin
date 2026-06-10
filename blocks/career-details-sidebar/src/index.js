/**
 * Job Details Sidebar Panel
 */

import { registerPlugin }               from '@wordpress/plugins';
import { PluginDocumentSettingPanel }   from '@wordpress/edit-post';
import { TextControl, SelectControl, CheckboxControl }                  from '@wordpress/components';
import { useEntityProp }                from '@wordpress/core-data';
import { __ }                           from '@wordpress/i18n';

function CareerDetailsPanel() {
    // Pull in all meta for the current Career post.
    const [ meta, setMeta ] = useEntityProp(
        'postType',
        'm2_career',
        'meta'
    );

    // If still loading…
    if ( meta === undefined ) {
        return null;
    }

    return (
        <PluginDocumentSettingPanel
            name="m2-career-details"
            title={ __( 'Career Details', 'm2-careers' ) }
            className="m2-career-details-panel"
        >
            <TextControl
                label={ __( 'Location', 'm2-careers' ) }
                value={ meta.m2_location || '' }
                onChange={ ( value ) =>
                    setMeta( { ...meta, m2_location: value } )
                }
            />
            <TextControl
                label={ __( 'Compensation', 'm2-careers' ) }
                value={ meta.m2_compensation || '' }
                onChange={ ( value ) =>
                    setMeta( { ...meta, m2_compensation: value } )
                }
            />
            <TextControl
                label={ __( 'Number of Openings', 'm2-careers' ) }
                type="number"
                value={ meta.m2_openings || '' }
                onChange={ ( value ) =>
                    setMeta( { ...meta, m2_openings: parseInt( value ) || 1 } )
                }
            />
            <SelectControl
                label={ __( 'Status', 'm2-careers' ) }
                value={ meta.m2_status || 'Draft' }
                options={ [
                    { label: 'Draft', value: 'Draft' },
                    { label: 'Open', value: 'Open' },
                    { label: 'Closed', value: 'Closed' },
                    { label: 'On Hold', value: 'On Hold' }
                ] }
                onChange={ ( value ) =>
                    setMeta( { ...meta, m2_status: value } )
                }
            />
            <TextControl
                label={ __( 'Apply URL', 'm2-careers' ) }
                type="url"
                value={ meta.m2_apply_url || '' }
                onChange={ ( value ) =>
                    setMeta( { ...meta, m2_apply_url: value } )
                }
            />
            <CheckboxControl
                label={ __( 'Confidential Client', 'm2-careers' ) }
                checked={ meta.m2_confidential_client || false }
                onChange={ ( value ) =>
                    setMeta( { ...meta, m2_confidential_client: value } )
                }
            />
            <TextControl
                label={ __( 'Partner Company', 'm2-careers' ) }
                value={ meta.m2_partner_company || '' }
                onChange={ ( value ) =>
                    setMeta( { ...meta, m2_partner_company: value } )
                }
            />
            <SelectControl
                label={ __( 'Employment Type', 'm2-careers' ) }
                value={ meta.m2_employment_type || '' }
                options={ [
                    { label: 'Select...', value: '' },
                    { label: 'Full-time', value: 'Full-time' },
                    { label: 'Part-time', value: 'Part-time' },
                    { label: 'Contract', value: 'Contract' },
                    { label: 'Temporary', value: 'Temporary' },
                    { label: 'Internship', value: 'Internship' }
                ] }
                onChange={ ( value ) =>
                    setMeta( { ...meta, m2_employment_type: value } )
                }
            />
            <SelectControl
                label={ __( 'Remote Type', 'm2-careers' ) }
                value={ meta.m2_remote_type || '' }
                options={ [
                    { label: 'Select...', value: '' },
                    { label: 'On-site', value: 'On-site' },
                    { label: 'Remote', value: 'Remote' },
                    { label: 'Hybrid', value: 'Hybrid' }
                ] }
                onChange={ ( value ) =>
                    setMeta( { ...meta, m2_remote_type: value } )
                }
            />
        </PluginDocumentSettingPanel>
    );
}

registerPlugin( 'm2-career-details-sidebar', {
    render: CareerDetailsPanel,
    icon:    null,
} );
