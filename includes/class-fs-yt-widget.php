<?php
class FSYTWidget extends WP_Widget {
    public function __construct(){
        add_action('init', [$this, 'register_custom_yt_widget']);
        parent::__construct('fs-yt-widget', 'Fluffy Spoon YT Widget', ['description'=>'This plugin creates widget to show yt channel details on the webste.']);
    }

    public function register_custom_yt_widget(){
        echo "Plugin has been initialized";
    }

    public function widget($args, $instance){
        echo $args['before_widget'];
        echo '<div class="widget-text">Hello from my custom widget</div>';
        echo $args['after_widget'];

    }

    public function form($instance){
        $text = !empty($instance['text']) ? $instance['text'] : 'This is default text';
        ?> <p>
    <label for="<?php echo($this->get_field_id('text')); ?>">Text:</label>
    <input class="wide-fat" name="<?php echo($this->get_field_name('text')); ?>"
        id="<?php echo($this->get_field_id('text')); ?>" value="<?php echo esc_attr($text); ?>" type="text" />
</p> <?php

    }

    public function update($new_instance, $old_instance){
        $instance = [];
        $instance['text'] = (!empty($new_instance['text'])) ? sanitize_text_field($new_instance['text']) : '';
        return $instance;

    }

}

?>