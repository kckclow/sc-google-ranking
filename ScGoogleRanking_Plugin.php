<?php


include_once('ScGoogleRanking_LifeCycle.php');

class ScGoogleRanking_Plugin extends ScGoogleRanking_LifeCycle {

    /**
     * @return array of option meta data.
     */
    public function getOptionMetaData() {

        return array(
            //'_version' => array('Installed Version'), // Leave this one commented-out. Uncomment to test upgrades.
            //'YourURL' => array(__('Your URL', 'sc-google-ranking')),
            'YourKeywords' => array(__('Your Keywords', 'sc-google-ranking')),
            'GoogleDomain' => array(__('Google Domain', 'sc-google-ranking'),
            	'google.com',
		'google.com.au',		
		'google.com.hk',
		'google.com.my',
		'google.com.sg',		
		'google.com.tw',
		'google.co.in',
		'google.co.jp',
		'google.co.uk'
            )
        );
    }

//    protected function getOptionValueI18nString($optionValue) {
//        $i18nValue = parent::getOptionValueI18nString($optionValue);
//        return $i18nValue;
//    }

    protected function initOptions() {
        $options = $this->getOptionMetaData();
        if (!empty($options)) {
            foreach ($options as $key => $arr) {
                if (is_array($arr) && count($arr > 1)) {
                    $this->addOption($key, $arr[1]);
                }
            }
        }
    }

    public function getPluginDisplayName() {
        return 'SC Google Page Rank';
    }

    protected function getMainPluginFileName() {
        return 'sc-google-ranking.php';
    }

    /**
     * Called by install() to create any database tables if needed.
     * Best Practice:
     * (1) Prefix all table names with $wpdb->prefix
     * (2) make table names lower case only
     * @return void
     */
    protected function installDatabaseTables() {
        //        global $wpdb;
        //        $tableName = $this->prefixTableName('mytable');
        //        $wpdb->query("CREATE TABLE IF NOT EXISTS `$tableName` (
        //            `id` INTEGER NOT NULL");
    }

    /**
     * See: http://plugin.michael-simpson.com/?page_id=101
     * Drop plugin-created tables on uninstall.
     * @return void
     */
    protected function unInstallDatabaseTables() {
        //        global $wpdb;
        //        $tableName = $this->prefixTableName('mytable');
        //        $wpdb->query("DROP TABLE IF EXISTS `$tableName`");
    }


    /**
     * Perform actions when upgrading from version X to version Y
     * @return void
     */
    public function upgrade() {
    }

    public function addActionsAndFilters() {

        // Add options administration page

        add_action('admin_menu', array(&$this, 'createSettingsMenu'));

                if (strpos($_SERVER['REQUEST_URI'], $this->getSettingsSlug()) !== false) {
        //            wp_enqueue_script('my-script', plugins_url('/js/my-script.js', __FILE__));
        //            wp_enqueue_style('style', plugins_url('/css/sc-styles.css', __FILE__));
                }


        // Add Actions & Filters



        // Adding scripts & styles to all pages
        // Examples:
        //        wp_enqueue_script('jquery');
                wp_enqueue_style('my-style', plugins_url('/css/sc-styles.css', __FILE__));
        //        wp_enqueue_script('my-script', plugins_url('/js/my-script.js', __FILE__));


        // Register short codes



        // Register AJAX hooks


    }


}