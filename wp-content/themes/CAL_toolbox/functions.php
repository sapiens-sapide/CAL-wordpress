<?php
    /**
     * Toolbox functions and definitions
     *
     * Sets up the theme and provides some helper functions. Some helper functions
     * are used in the theme as custom template tags. Others are attached to action and
     * filter hooks in WordPress to change core functionality.
     *
     * When using a child theme (see http://codex.wordpress.org/Theme_Development and
     * http://codex.wordpress.org/Child_Themes), you can override certain functions
     * (those wrapped in a function_exists() call) by defining them first in your child theme's
     * functions.php file. The child theme's functions.php file is included before the parent
     * theme's file, so the child theme functions would be used.
     *
     * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
     * to a filter or action hook. The hook can be removed by using remove_action() or
     * remove_filter() and you can attach your own function to the hook.
     *
     * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
     *
     * @package WordPress
     * @subpackage Toolbox
     * @since Toolbox 0.1
     */

    /**
     * Set the content width based on the theme's design and stylesheet.
     */
    if (!isset($content_width)) {
        $content_width = 640;
    } /* pixels */

    if (!function_exists('toolbox_setup')
    ):
        /**
         * Sets up theme defaults and registers support for various WordPress features.
         *
         * Note that this function is hooked into the after_setup_theme hook, which runs
         * before the init hook. The init hook is too late for some features, such as indicating
         * support post thumbnails.
         *
         * To override toolbox_setup() in a child theme, add your own toolbox_setup to your child theme's
         * functions.php file.
         */ function toolbox_setup ()
    {
        /**
         * Make theme available for translation
         * Translations can be filed in the /languages/ directory
         * If you're building a theme based on toolbox, use a find and replace
         * to change 'toolbox' to the name of your theme in all the template files
         */
        load_theme_textdomain('toolbox', get_template_directory() . '/languages');

        $locale = get_locale();
        $locale_file = get_template_directory() . "/languages/$locale.php";
        if (is_readable($locale_file)) {
            require_once($locale_file);
        }

        /**
         * Add default posts and comments RSS feed links to head
         */
        add_theme_support('automatic-feed-links');

        /**
         * This theme uses wp_nav_menu() in one location.
         */
        register_nav_menus(array(
            'primary'             => __('Primary Menu', 'toolbox'),
            'leftNav-actualites'  => __('Pages actualités'),
            'leftNav-prestations' => __('Prestations'),
            'leftNav-cabinet'     => __('Cabinet'),
            'leftNav-clients'     => __('Clients'),
            'leftNav-ressources'  => __('Ressources')
        ));

        /**
         * Add support for the Aside and Gallery Post Formats
         */
        add_theme_support('post-formats', array('aside', 'image', 'gallery'));
    }
    endif; // toolbox_setup

    /**
     * Tell WordPress to run toolbox_setup() when the 'after_setup_theme' hook is run.
     */
    add_action('after_setup_theme', 'toolbox_setup');

    /**
     * Set a default theme color array for WP.com.
     */
    $themecolors = array(
        'bg'     => 'ffffff',
        'border' => 'eeeeee',
        'text'   => '444444',
    );

    /**
     * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
     */
    function toolbox_page_menu_args ($args)
    {
        $args['show_home'] = true;
        return $args;
    }

    add_filter('wp_page_menu_args', 'toolbox_page_menu_args');

    /**
     * Register widgetized area and update sidebar with default widgets
     */
    function toolbox_widgets_init ()
    {
        register_sidebar(array(
            'name'          => __('Sidebar actu', 'toolbox'),
            'id'            => 'CALside-1',
            'description'   => __('colonne de droite sur les pages de listing des articles', 'toolbox'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => "</aside>",
            'before_title'  => '<h1 class="widget-title">',
            'after_title'   => '</h1>',
        ));

        register_sidebar(array(
            'name'          => __('Sidebar article', 'toolbox'),
            'id'            => 'CALside-2',
            'description'   => __('colonne de droite sur les articles', 'toolbox'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => "</aside>",
            'before_title'  => '<h1 class="widget-title">',
            'after_title'   => '</h1>',
        ));
        register_sidebar(array(
            'name'          => __('Sidebar activité', 'toolbox'),
            'id'            => 'CALside-3',
            'description'   => __('colonne de droite sur la page activité', 'toolbox'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => "</aside>",
            'before_title'  => '<h1 class="widget-title">',
            'after_title'   => '</h1>',
        ));
        register_sidebar(array(
            'name'          => __('Sidebar clients+lettre info', 'toolbox'),
            'id'            => 'CALside-4',
            'description'   => __('colonne de droite sur les pages clients et lettre info', 'toolbox'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => "</aside>",
            'before_title'  => '<h1 class="widget-title">',
            'after_title'   => '</h1>',
        ));
        register_sidebar(array(
            'name'          => __('Sidebar nous écrire', 'toolbox'),
            'id'            => 'CALside-5',
            'description'   => __('colonne de droite sur la page nous écrire', 'toolbox'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => "</aside>",
            'before_title'  => '<h1 class="widget-title">',
            'after_title'   => '</h1>',
        ));
        register_sidebar(array(
            'name'          => __('Sidebar publications', 'toolbox'),
            'id'            => 'CALside-6',
            'description'   => __('colonne de droite sur la page publications', 'toolbox'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => "</aside>",
            'before_title'  => '<h1 class="widget-title">',
            'after_title'   => '</h1>',
        ));
        register_sidebar(array(
            'name'          => __('Sidebar conditions intervention', 'toolbox'),
            'id'            => 'CALside-7',
            'description'   => __('colonne de droite sur la page conditions intervention', 'toolbox'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => "</aside>",
            'before_title'  => '<h1 class="widget-title">',
            'after_title'   => '</h1>',
        ));
        register_sidebar(array(
            'name'          => __('Sidebar domaines', 'toolbox'),
            'id'            => 'CALside-8',
            'description'   => __('colonne de droite sur la page domaines intervention', 'toolbox'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => "</aside>",
            'before_title'  => '<h1 class="widget-title">',
            'after_title'   => '</h1>',
        ));
        register_sidebar(array(
            'name'          => __('Sidebar le cabinet', 'toolbox'),
            'id'            => 'CALside-9',
            'description'   => __('colonne de droite sur les pages Cabinet', 'toolbox'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => "</aside>",
            'before_title'  => '<h1 class="widget-title">',
            'after_title'   => '</h1>',
        ));
    }

    add_action('init', 'toolbox_widgets_init');

    if (!function_exists('toolbox_content_nav')
    ):
        /**
         * Display navigation to next/previous pages when applicable
         *
         * @since Toolbox 1.2
         */ function toolbox_content_nav ($nav_id)
    {
        global $wp_query;

        ?>
    <nav id="<?php echo $nav_id; ?>">
        <h1 class="assistive-text section-heading"><?php _e('Post navigation', 'toolbox'); ?></h1>

        <?php if (is_single()) : // navigation links for single posts ?>

        <?php previous_post_link('<div class="nav-previous">%link</div>', '<span class="meta-nav">' . _x('&larr;', 'Previous post link', 'toolbox') . '</span> %title'); ?>
        <?php next_post_link('<div class="nav-next">%link</div>', '%title <span class="meta-nav">' . _x('&rarr;', 'Next post link', 'toolbox') . '</span>'); ?>

        <?php elseif ($wp_query->max_num_pages > 1 && (is_home() || is_archive() || is_search())) : // navigation links for home, archive, and search pages ?>

        <?php if (get_next_posts_link()) : ?>
            <div class="nav-previous"><?php next_posts_link(__('<span class="meta-nav">&larr;</span> Older posts', 'toolbox')); ?></div>
            <?php endif; ?>

        <?php if (get_previous_posts_link()) : ?>
            <div class="nav-next"><?php previous_posts_link(__('Newer posts <span class="meta-nav">&rarr;</span>', 'toolbox')); ?></div>
            <?php endif; ?>

        <?php endif; ?>

    </nav><!-- #<?php echo $nav_id; ?> -->
    <?php
    }
    endif; // toolbox_content_nav


    if (!function_exists('toolbox_comment')
    ) :
        /**
         * Template for comments and pingbacks.
         *
         * To override this walker in a child theme without modifying the comments template
         * simply create your own toolbox_comment(), and that function will be used instead.
         *
         * Used as a callback by wp_list_comments() for displaying the comments.
         *
         * @since Toolbox 0.4
         */ function toolbox_comment ($comment, $args, $depth)
    {
        $GLOBALS['comment'] = $comment;
        switch ($comment->comment_type) :
            case 'pingback' :
            case 'trackback' :
                ?>
	<li class="post pingback">
		<p><?php _e('Pingback:', 'toolbox'); ?> <?php comment_author_link(); ?><?php edit_comment_link(__('(Edit)', 'toolbox'), ' '); ?></p>
                    <?php
                break;
            default :
                ?>
                <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
                    <article id="comment-<?php comment_ID(); ?>" class="comment">
                        <footer>
                            <div class="comment-author vcard">
                                <?php echo get_avatar($comment, 40); ?>
                                <?php printf(__('%s <span class="says">says:</span>', 'toolbox'), sprintf('<cite class="fn">%s</cite>', get_comment_author_link())); ?>
                            </div>
                            <!-- .comment-author .vcard -->
                            <?php if ($comment->comment_approved == '0') : ?>
                            <em><?php _e('Your comment is awaiting moderation.', 'toolbox'); ?></em>
                            <br/>
                            <?php endif; ?>

                            <div class="comment-meta commentmetadata">
                                <a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>">
                                    <time pubdate datetime="<?php comment_time('c'); ?>">
                                        <?php
                                        /* translators: 1: date, 2: time */
                                        printf(__('%1$s at %2$s', 'toolbox'), get_comment_date(), get_comment_time()); ?>
                                    </time>
                                </a>
                                <?php edit_comment_link(__('(Edit)', 'toolbox'), ' ');
                                ?>
                            </div>
                            <!-- .comment-meta .commentmetadata -->
                        </footer>

                        <div class="comment-content"><?php comment_text(); ?></div>

                        <div class="reply">
                            <?php comment_reply_link(array_merge($args, array('depth'     => $depth,
                                                                              'max_depth' => $args['max_depth']))); ?>
                        </div>
                        <!-- .reply -->
                    </article>
                    <!-- #comment-## -->

                    <?php
                break;
        endswitch;
    }
    endif; // ends check for toolbox_comment()

    if (!function_exists('toolbox_posted_on')
    ) :
        /**
         * Prints HTML with meta information for the current post-date/time and author.
         * Create your own toolbox_posted_on to override in a child theme
         *
         * @since Toolbox 1.2
         */ function toolbox_posted_on ()
    {
        printf(__('<span class="sep">Posted on </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a><span class="byline"> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', 'toolbox'),
            esc_url(get_permalink()),
            esc_attr(get_the_time()),
            esc_attr(get_the_date('c')),
            esc_html(get_the_date()),
            esc_url(get_author_posts_url(get_the_author_meta('ID'))),
            esc_attr(sprintf(__('View all posts by %s', 'toolbox'), get_the_author())),
            esc_html(get_the_author())
        );
    }
    endif;

    /**
     * Adds custom classes to the array of body classes.
     *
     * @since Toolbox 1.2
     */
    function toolbox_body_classes ($classes)
    {
        // Adds a class of single-author to blogs with only 1 published author
        if (!is_multi_author()) {
            $classes[] = 'single-author';
        }

        return $classes;
    }

    add_filter('body_class', 'toolbox_body_classes');

    /**
     * Returns true if a blog has more than 1 category
     *
     * @since Toolbox 1.2
     */
    function toolbox_categorized_blog ()
    {
        if (false === ($all_the_cool_cats = get_transient('all_the_cool_cats'))) {
            // Create an array of all the categories that are attached to posts
            $all_the_cool_cats = get_categories(array(
                'hide_empty' => 1,
            ));

            // Count the number of categories that are attached to the posts
            $all_the_cool_cats = count($all_the_cool_cats);

            set_transient('all_the_cool_cats', $all_the_cool_cats);
        }

        if ('1' != $all_the_cool_cats) {
            // This blog has more than 1 category so toolbox_categorized_blog should return true
            return true;
        }
        else {
            // This blog has only 1 category so toolbox_categorized_blog should return false
            return false;
        }
    }

    /**
     * Flush out the transients used in toolbox_categorized_blog
     *
     * @since Toolbox 1.2
     */
    function toolbox_category_transient_flusher ()
    {
        // Like, beat it. Dig?
        delete_transient('all_the_cool_cats');
    }

    add_action('edit_category', 'toolbox_category_transient_flusher');
    add_action('save_post', 'toolbox_category_transient_flusher');

    /**
     * Filter in a link to a content ID attribute for the next/previous image links on image attachment pages
     */
    function toolbox_enhanced_image_navigation ($url)
    {
        global $post;

        if (wp_attachment_is_image($post->ID)) {
            $url = $url . '#main';
        }

        return $url;
    }

    add_filter('attachment_link', 'toolbox_enhanced_image_navigation');

    /* functions added by sapienssapide */
    // set custom length for excerpt
    function custom_excerpt_length ($length)
    {
        return 20;
    }

    add_filter('excerpt_length', 'custom_excerpt_length', 999);

    function CAL_get_leftNav ()
    {
        ?>
        <nav class="leftNav">
            <?php
            if (is_page(array(107, 105))) :
                wp_nav_menu(array('theme_location' => 'leftNav-prestations'));
            elseif (is_home() || is_category() || is_single()):
                wp_nav_menu(array('theme_location' => 'leftNav-actualites'));
            elseif (is_page(array(29, 113, 115, 163, 165))):
                wp_nav_menu(array('theme_location' => 'leftNav-clients'));
            elseif (is_page(array(23, 25, 27, 142, 144, 146, 151))):
                wp_nav_menu(array('theme_location' => 'leftNav-cabinet'));
            elseif (is_page(array(31, 93, 35, 33, 92))):
                wp_nav_menu(array('theme_location' => 'leftNav-ressources'));
            endif;
            ?>
        </nav>
    <?php
    }

    function CAL_get_sidebar ()
    {
        if (is_page(array(107, 105))):
            get_sidebar('CALside-8');
        elseif (is_page(array(23, 25, 142, 144, 146))):
            get_sidebar('CALside-9');
        elseif (is_page(151)):
            get_sidebar('CALside-5');
        elseif (is_page(array(93, 29, 113, 115, 163, 165))):
            get_sidebar('CALside-4');
        elseif (is_home() || is_category() || is_single()):
            get_sidebar('CALside-1');
        endif;
    }

    //// Custom Post Type registration (copy & past from admin field) ////////
    function create_post_type ()
    {
        register_post_type('publications', array('label'           => 'Publications',
                                                 'description'     => 'ouvrages publiés par les associés',
                                                 'public'          => true,
                                                 'show_ui'         => true,
                                                 'show_in_menu'    => true,
                                                 'capability_type' => 'post',
                                                 'hierarchical'    => false,
                                                 'rewrite'         => array('slug' => ''),
                                                 'query_var'       => true,
                                                 'supports'        => array('title', 'editor', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'thumbnail', 'author', 'page-attributes',),
                                                 'labels'          => array(
                                                     'name'               => 'Publications',
                                                     'singular_name'      => 'Publication',
                                                     'menu_name'          => 'Publications',
                                                     'add_new'            => 'Add Publication',
                                                     'add_new_item'       => 'Add New Publication',
                                                     'edit'               => 'Edit',
                                                     'edit_item'          => 'Edit Publication',
                                                     'new_item'           => 'New Publication',
                                                     'view'               => 'View Publication',
                                                     'view_item'          => 'View Publication',
                                                     'search_items'       => 'Search Publications',
                                                     'not_found'          => 'No Publications Found',
                                                     'not_found_in_trash' => 'No Publications Found in Trash',
                                                     'parent'             => 'Parent Publication',
                                                 ),));
    }

    add_action('init', 'create_post_type');
    /**
     * This theme was built with PHP, Semantic HTML, CSS, love, and a Toolbox.
     */
?>