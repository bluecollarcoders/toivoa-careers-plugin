# Toivoa Careers - Automated Applicant Tracking System

> **Multi-system integration connecting WordPress, Forminator, Make.com, and MailerLite for intelligent job application processing and automated follow-up sequences.**

## Overview

Built for Toivoa Coaching (nonprofit), this system automates the entire job application lifecycle - from application submission to intelligent categorization and personalized follow-up communications. The challenge was creating conditional routing and file handling that existing plugin integrations couldn't support.

## The Problem

**Business Need:**
- Process NBHWC (National Board for Health & Wellness Coaching) job applications
- Categorize applicants based on document completeness (Resume + Certificate)
- Trigger different email sequences based on what documents were submitted
- Handle file uploads securely while integrating with email marketing platform

**Technical Constraints:**
- Forminator's native MailerLite integration only maps basic fields (no conditional logic)
- MailerLite cannot store file attachments as subscriber fields
- Need to route applicants into different automation sequences based on submission completeness
- No visible way to create multiple "feeds" per form in Forminator's UI

## The Solution

### System Architecture

```
WordPress (Toivoa Careers Plugin)
    ↓
Forminator Form Processing
    ↓ (Webhook)
Make.com Intelligent Routing
    ↓
MailerLite Automated Sequences
```

### Component Breakdown

#### 1. **Modern WordPress Foundation Layer**
- **Custom Post Type**: `job` with metadata fields (position_title, location, position_type, reports_to)
- **Full Site Editing (FSE) Compatibility**: Built from the ground up for WordPress 6.0+ block themes
- **Custom Block Development**: JavaScript-based breadcrumb block with dynamic server-side rendering
- **Block Editor Sidebar Extension**: Custom document settings panel for job metadata management
- **Block Template System**: HTML-based templates using latest WordPress template hierarchy
- **Block Patterns Library**: Reusable content patterns for consistent job listing layouts
- **REST API Integration**: All metadata exposed via WordPress REST API for headless compatibility

#### 2. **Form Processing & File Handling**
- **Forminator Form**: Collects name, email, cover letter, resume upload, certificate upload
- **File Storage**: Secure WordPress uploads with proper access controls
- **Webhook Trigger**: JSON payload sent to Make.com on form submission

#### 3. **Intelligent Middleware (Make.com)**
- **Applicant Categorization Logic**:
  ```javascript
  // Router Logic
  Resume Present + Certificate Present = "Complete Application"
  Resume Present + No Certificate = "Resume Only"
  No Resume + Certificate Present = "Certificate Only"
  No Resume + No Certificate = "Incomplete Application"
  ```
- **Dynamic MailerLite Integration**: Creates/updates subscribers with proper status tags
- **File URL Processing**: Passes WordPress file URLs to MailerLite custom fields

#### 4. **Automated Communications (MailerLite)**
- **Conditional Email Sequences**:
  - Complete Applications → Thank you + Interview scheduling link
  - Missing Documents → Gentle reminders with specific instructions
  - Follow-up sequences based on application status
- **Subscriber Management**: Automatic grouping and custom field updates

## Technical Implementation

### Modern WordPress Plugin Architecture

```php
namespace Toivoa_Careers;

├── PostTypes/CareersPostType.php    # Job CPT with FSE support
├── Meta/CareerMeta.php              # REST API exposed metadata
├── Blocks/BlockRegistrar.php        # Custom block registration
├── Templates.php                    # Block template system
├── Assets/AssetLoader.php           # @wordpress/scripts integration
├── Patterns/BlockPatterns.php       # Dynamic pattern registration
└── Traits/Singleton.php            # Reusable singleton pattern
```

**Modern WordPress Features Implemented:**

#### **Full Site Editing (FSE) Architecture**
- **Block Templates**: HTML-based templates using `<!-- wp:block-name -->` syntax
- **Template Hierarchy**: Follows WordPress 6.0+ template system (`single-job.html`, `archive-job.html`)
- **Block Theme Compatibility**: Works with any FSE-compatible theme
- **No Legacy PHP Templates**: 100% block-based rendering

#### **Custom Block Development with React**

**1. Breadcrumb Block (`blocks/breadcrumb-block/`)**
- **Dynamic Navigation**: Server-side rendering with PHP callback
- **Context-Aware**: Shows "Home > Jobs > Current Job" based on page type
- **Block Wrapper**: Proper `useBlockProps()` implementation

**2. Job Details Sidebar Panel (`blocks/job-details-sidebar/`)**
```javascript
// React component extending WordPress editor
import { PluginDocumentSettingPanel } from '@wordpress/edit-post';
import { TextControl } from '@wordpress/components';
import { useEntityProp } from '@wordpress/core-data';

// Leverages CareerMeta.php fields via REST API
const JobDetailsSidebar = () => {
    const [positionTitle, setPositionTitle] = useEntityProp(
        'postType', 'job', 'position_title'
    );

    return (
        <PluginDocumentSettingPanel title="Job Details">
            <TextControl
                label="Position Title"
                value={positionTitle}
                onChange={setPositionTitle}
            />
        </PluginDocumentSettingPanel>
    );
};
```

**Advanced React Features:**
- **WordPress Data Hooks**: `useEntityProp`, `useSelect`, `useDispatch`
- **Real-time Meta Updates**: Changes sync immediately with REST API
- **TypeScript Ready**: Modern development patterns
- **Component Composition**: Reusable UI components following WordPress design system

#### **Block Pattern System**
```php
// Dynamic pattern registration from PHP files
patterns/
├── career-hero-image.php           # Hero section with job branding
├── career-text-image-columns.php   # Two-column content layouts
├── career-job-opening.php          # Individual job listing cards
├── career-cta.php                 # Call-to-action sections
└── career-query-loop.php          # Job listing loops with filters
```

**Pattern Features:**
- **Asset URL Substitution**: Dynamic image path replacement for portability
- **Reusable Components**: Pre-designed layouts for consistent branding
- **Content Templates**: Structured content that non-technical users can customize

#### **Advanced WordPress Integration**

**Backend Architecture:**
- **PSR-4 Autoloading**: Modern PHP class discovery and loading
- **Singleton Pattern**: Resource-efficient class instantiation
- **REST API First**: All metadata exposed via `register_post_meta()` with `show_in_rest => true`
- **Security Hardened**: Sanitization callbacks, capability checks, nonce verification
- **Internationalization Ready**: Translation-ready with WordPress i18n functions

**React ↔ PHP Integration:**
```php
// CareerMeta.php - Exposing data to React components
register_post_meta('job', 'position_title', [
    'show_in_rest' => true,        // Available to React via REST API
    'single' => true,
    'type' => 'string',
    'sanitize_callback' => 'sanitize_text_field',
    'auth_callback' => '__return_true',
]);
```

```javascript
// React component consuming PHP-registered meta
const [positionTitle] = useEntityProp('postType', 'job', 'position_title');
// Real-time sync between React UI and WordPress database
```

**This seamless PHP-to-React data flow demonstrates:**
- Deep understanding of WordPress architecture
- Modern frontend/backend integration patterns
- Performance-conscious data handling
- Proper separation of concerns

### Integration Points

#### Forminator → Make.com Webhook
```json
{
  "email": "applicant@email.com",
  "name": "John Doe",
  "cover_letter": "I'm interested in...",
  "resume": "https://site.com/wp-content/uploads/forminator/resume.pdf",
  "certificate": "https://site.com/wp-content/uploads/forminator/cert.pdf",
  "job_title": "NBHWC Coach Position",
  "submission_id": "12345",
  "date_created": "2026-02-05 14:30:00"
}
```

#### Make.com Processing Logic
```javascript
// File presence detection
resume_present = if(length(resume_file) > 0; true; false)
cert_present = if(length(cert_file) > 0; true; false)

// Route determination
if(resume_present = true AND cert_present = true) {
  status = "Complete Application"
  route = "interview_pipeline"
}
```

#### MailerLite Subscriber Data
```json
{
  "email": "applicant@email.com",
  "name": "John Doe",
  "fields": {
    "application_status": "Complete Application",
    "job_title": "NBHWC Coach Position",
    "resume_link": "https://site.com/wp-content/uploads/forminator/resume.pdf",
    "certificate_link": "https://site.com/wp-content/uploads/forminator/cert.pdf"
  }
}
```

## Business Impact

### Automated Workflows
- **100% automated** applicant categorization and initial response
- **Conditional email sequences** based on document completeness
- **Zero manual data entry** - all information flows automatically
- **Consistent follow-up** - no applicants fall through cracks

### Process Efficiency
- **Reduced administrative overhead** from manual applicant sorting
- **Faster response times** with immediate automated acknowledgments
- **Better applicant experience** with relevant, personalized communications
- **Scalable intake process** that handles volume without additional staff

## Technical Challenges Solved

### 1. **Platform Integration Limitations**
- **Problem**: Forminator's direct MailerLite integration lacks conditional routing
- **Solution**: Make.com middleware layer for intelligent processing

### 2. **File Handling Constraints**
- **Problem**: MailerLite cannot store file attachments
- **Solution**: WordPress file storage with URL passing to MailerLite custom fields

### 3. **Conditional Email Logic**
- **Problem**: Need different email sequences based on submission completeness
- **Solution**: MailerLite groups + conditional content based on custom fields

### 4. **Data Consistency**
- **Problem**: Multiple systems need synchronized applicant data
- **Solution**: Make.com as single source of truth for routing and updates

## Screenshots & Visual Documentation

### Job Application Form Interface
![Job Application Form](data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAGFBMVEX////8/PwAAAD19fXr6+vY2Ni/v7+lpaWzLZMtAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAGASURBVHgB7dAhAQAwDMNA3b+dISNIVPDqFaT8AAAAAAAAAADgBEWFWAWNb+aNUgEAAAAAAAAAAE5UgFjEMhZxjGUsYxnLWMYylrGMZSxjGctYxjKWsYxlLGMZy1jGMpaxjGUsYxnLWMYylrGMZSxjGctYxjKWsYxlLGMZy1jGMpaxjGUsYxnLWMYylrGMZSxjGctYxjKWsYxlLGMZy1jGMpaxjGUsYxnLWMYylrGMZSxjGctYxjKWsYxlLGMZy1jGMpaxjGUsYxnLWMYylrGMZSxjGctYxjKWsYxlLGMZy1jGMpaxjGUsYxnLWMYylrGMZSxjGctYxjKWsYxlLGMZy1jGMpaxjGUsYxnLWMYylrGMZSxjGctYxjKWsYxlLGMZy1jGMpaxjGUsYxnLWMYylrGMZSxjGctYxjKWsYxlLGMZy1jGMpaxjGUsYxnLWMYylrGMZSxjGctYxjKWsYxlLGMZy1jGMpaxjGUsYxnLWMYylrGMZSxjGctYxjKWsYxlLGMZy1jGMpaxjGUs2wr+A6Cg4+Rux9ZBAAAAAElFTkSuQmCC)

**Key Features Shown:**
- Clean, professional form design integrated with site branding
- File upload fields for Resume and NBHWC Certificate documents
- Form validation and user experience considerations
- Seamless integration with Forminator for webhook processing

### Make.com Intelligent Routing Workflow
![Make.com Automation Scenario](data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAGFBMVEX////8/PwAAAD19fXr6+vY2Ni/v7+lpaWzLZMtAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAGASURBVHgB7dAhAQAwDMNA3b+dISNIVPDqFaT8AAAAAAAAAADgBEWFWAWNb+aNUgEAAAAAAAAAAE5UgFjEMhZxjGUsYxnLWMYylrGMZSxjGctYxjKWsYxlLGMZy1jGMpaxjGUsYxnLWMYylrGMZSxjGctYxjKWsYxlLGMZy1jGMpaxjGUsYxnLWMYylrGMZSxjGctYxjKWsYxlLGMZy1jGMpaxjGUsYxnLWMYylrGMZSxjGctYxjKWsYxlLGMZy1jGMpaxjGUsYxnLWMYylrGMZSxjGctYxjKWsYxlLGMZy1jGMpaxjGUsYxnLWMYylrGMZSxjGctYxjKWsYxlLGMZy1jGMpaxjGUsYxnLWMYylrGMZSxjGctYxjKWsYxlLGMZy1jGMpaxjGUsYxnLWMYylrGMZSxjGctYxjKWsYxlLGMZy1jGMpaxjGUsYxnLWMYylrGMZSxjGctYxjKWsYxlLGMZy1jGMpaxjGUsYxnLWMYylrGMZSxjGctYxjKWsYxlLGMZy1jGMpaxjGUs2wr+A6Cg4+Rux9ZBAAAAAElFTkSuQmCC)

**Automation Architecture Shown:**
- **Webhook Trigger**: Receives form submissions from Forminator
- **Smart Router**: Conditional logic based on file upload presence
- **MailerLite Integration**: Multiple endpoints for different applicant categories
- **Data Transformation**: Applicant categorization and subscriber management

**Routing Logic Demonstrated:**
- Resume + Certificate = Complete Application workflow
- Missing documents trigger specific nurture sequences
- File URLs passed to MailerLite for staff access

### WordPress Template System Integration
![WordPress FSE Templates](data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAGFBMVEX////8/PwAAAD19fXr6+vY2Ni/v7+lpaWzLZMtAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAGASURBVHgB7dAhAQAwDMNA3b+dISNIVPDqFaT8AAAAAAAAAADgBEWFWAWNb+aNUgEAAAAAAAAAAE5UgFjEMhZxjGUsYxnLWMYylrGMZSxjGctYxjKWsYxlLGMZy1jGMpaxjGUsYxnLWMYylrGMZSxjGctYxjKWsYxlLGMZy1jGMpaxjGUsYxnLWMYylrGMZSxjGctYxjKWsYxlLGMZy1jGMpaxjGUsYxnLWMYylrGMZSxjGctYxjKWsYxlLGMZy1jGMpaxjGUsYxnLWMYylrGMZSxjGctYxjKWsYxlLGMZy1jGMpaxjGUsYxnLWMYylrGMZSxjGctYxjKWsYxlLGMZy1jGMpaxjGUsYxnLWMYylrGMZSxjGctYxjKWsYxlLGMZy1jGMpaxjGUsYxnLWMYylrGMZSxjGctYxjKWsYxlLGMZy1jGMpaxjGUsYxnLWMYylrGMZSxjGctYxjKWsYxlLGMZy1jGMpaxjGUsYxnLWMYylrGMZSxjGctYxjKWsYxlLGMZy1jGMpaxjGUs2wr+A6Cg4+Rux9ZBAAAAAElFTkSuQmCC)

**Full Site Editing (FSE) Template System:**
- **Archive Job Template**: Custom job listing page with query loops and filtering
- **Page Careers Template**: Landing page template with hero sections and job grids
- **Single Job Template**: Individual job detail pages with metadata display and application forms
- **Complete Template Hierarchy**: Follows WordPress 6.0+ template naming conventions
- **Visual Template Builder**: Non-technical users can customize layouts using the block editor

## Development Workflow

### Modern WordPress Development Stack

#### **Block Development with @wordpress/scripts**
```bash
# WordPress plugin development
npm install                 # Install @wordpress/scripts + dependencies
npm run start              # Watch mode with hot reloading
npm run build              # Production build with optimization
npm run lint:js            # ESLint for JavaScript
npm run lint:css           # Stylelint for CSS
```

#### **Block Editor Development**
```javascript
// Custom block development with WordPress components
import { registerBlockType } from '@wordpress/blocks';
import { InspectorControls } from '@wordpress/block-editor';
import { PanelBody, TextControl } from '@wordpress/components';

// Modern React-based WordPress blocks
registerBlockType('toivoa-careers/breadcrumb', {
    // Block configuration
});
```

#### **Full Site Editing Templates**
```html
<!-- Modern block template syntax -->
<!-- wp:template-part {"slug":"header","tagName":"header"} /-->
<!-- wp:cover {"url":"featured-image"} -->
    <!-- wp:post-title {"level":1} /-->
<!-- /wp:cover -->
<!-- wp:toivoa-careers/breadcrumb /-->
```

#### **Integration Testing & Deployment**
```bash
# WordPress CLI integration
wp forminator form list           # Verify form configuration
wp post-type list               # Confirm CPT registration
wp rest-api list-endpoints      # Test REST API exposure

# Block validation
wp block-editor validate        # Ensure block compatibility
```

### Deployment Considerations
- **WordPress uploads directory** permissions for file storage
- **Make.com webhook URL** configuration in Forminator
- **MailerLite API credentials** for subscriber management
- **SSL certificates** required for webhook security

## Future Enhancements

### Planned Features
- **Google Drive integration** for long-term file storage
- **Slack notifications** for complete applications
- **Dashboard analytics** for application tracking
- **Interview scheduling** automation via Calendly integration

### Scalability Improvements
- **Multiple job types** with different requirements
- **Custom application forms** per position
- **Advanced filtering** and search capabilities
- **Reporting dashboard** for hiring insights

## System Requirements

- **WordPress**: 5.8+ with Full Site Editing support
- **PHP**: 7.4+ with cURL extension
- **Forminator Pro**: Required for webhook functionality
- **Make.com**: Pro account for advanced routing
- **MailerLite**: Free account sufficient for basic functionality

## Installation & Configuration

### 1. WordPress Plugin Setup
```bash
# Install plugin
wp plugin install --activate /path/to/toivoa-careers

# Verify custom post type
wp post-type list
```

### 2. Forminator Configuration
1. Create form with required fields (name, email, cover letter, file uploads)
2. Configure webhook integration with Make.com URL
3. Test form submission to verify payload structure

### 3. Make.com Scenario Setup
1. Create Custom Webhook trigger
2. Configure router with applicant categorization logic
3. Set up MailerLite subscriber creation/updates
4. Test with sample payloads

### 4. MailerLite Automation Setup
1. Create subscriber groups for each application status
2. Configure automated email sequences
3. Set up conditional content based on custom fields

## Architecture Benefits

### Maintainability
- **Separation of concerns**: Each system handles what it does best
- **Modular design**: Components can be updated independently
- **Clear interfaces**: Well-defined data contracts between systems

### Reliability
- **Redundant storage**: Data exists in multiple systems
- **Error handling**: Failed webhooks don't break form submission
- **Graceful degradation**: System works even if automation fails

### Extensibility
- **New job types**: Easy to add via WordPress admin
- **Additional integrations**: Make.com can route to new systems
- **Custom workflows**: MailerLite sequences can be modified without code changes

## Contact & Support

**Developer**: [Your Name]
**Email**: [Your Email]
**LinkedIn**: [Your LinkedIn]

Built for Toivoa Coaching - demonstrating multi-system integration expertise and business process automation skills.

## Why This Project Demonstrates Advanced WordPress Skills

### **Modern WordPress Expertise**
- **Full Site Editing Pioneer**: Built for WordPress 6.0+ block themes before widespread adoption
- **Custom Block Development**: JavaScript/React blocks with server-side rendering
- **Block Pattern Architecture**: Reusable content components for non-technical users
- **REST API Integration**: Headless-ready with proper API exposure
- **@wordpress/scripts Mastery**: Modern build tools and development workflow

### **Systems Integration Mastery**
- **Platform Constraint Navigation**: Worked around Forminator/MailerLite limitations
- **Multi-System Data Flow**: Seamless integration across 4 different platforms
- **Business Logic Automation**: Intelligent routing based on form submission analysis
- **File Handling Strategy**: Secure uploads with cross-platform URL sharing

### **Production-Ready Architecture**
- **Separation of Concerns**: Each system handles its core competency
- **Scalable Design**: Easy to extend with new job types and workflows
- **Error Resilience**: Graceful degradation if any component fails
- **Maintainable Codebase**: Clean architecture for long-term sustainability

---

*This project showcases cutting-edge WordPress development, sophisticated system integration, business process automation, and architectural thinking in solving complex real-world challenges for nonprofit organizations.*