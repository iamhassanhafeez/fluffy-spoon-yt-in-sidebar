<?php
class FSYTWidget {
    public function __construct(){
        add_action('init', [$this, 'register_custom_yt_widget']);
    }

    public function register_custom_yt_widget(){
        echo "Plugin Initialized";
    }
}

?>