<?php
class FSYTWidget extends WP_Widget {
    public function __construct(){
        parent::__construct('fs-yt-widget', 'Fluffy Spoon YT Widget', ['description'=>'This plugin creates widget to show yt channel details on the webste.']);
    }

    public function widget($args, $instance){
        $text = !empty($instance['text']) ? $instance['text'] : '';
        $channel_name = !empty($instance['channel_name']) ? $instance['channel_name'] : 'My YouTube Channel';
        $channel_image = !empty($instance['channel_image']) ? $instance['channel_image'] : '';
        $channel_url = !empty($instance['channel_url']) ? $instance['channel_url'] : '#';

        echo $args['before_widget'];
        ?> <div class="yt-widget"> <?php if (!empty($channel_image)): ?> <a href="<?php echo esc_url($channel_url); ?>"
        target="_blank">
        <img src="<?php echo esc_url($channel_image); ?>" alt="<?php echo esc_attr($channel_name); ?>"
            style="width:100%; height:auto;" />
    </a> <?php endif; ?> <h3><a href="<?php echo esc_url($channel_url); ?>"
            target="_blank"><?php echo esc_html($channel_name); ?></a></h3>
    <p><?php echo esc_html($text); ?></p>
</div> <?php
        echo $args['after_widget'];

    }

    public function form($instance){
        $text = !empty($instance['text']) ? $instance['text'] : 'This is default text';
        $channel_name = !empty($instance['channel_name']) ? $instance['channel_name'] : '';
        $channel_imge = !empty($instance['channel_imge']) ? $instance['channel_imge'] : '';
        $channel_url = !empty($instance['channel_url']) ? $instance['channel_url'] : '';
        ?> <p>
    <label for="<?php echo($this->get_field_id('text')); ?>">Text:</label>
    <input class="widefat" name="<?php echo($this->get_field_name('text')); ?>"
        id="<?php echo($this->get_field_id('text')); ?>" value="<?php echo esc_attr($text); ?>" type="text" />
</p>
<p>
    <label for="<?php echo($this->get_field_id('channel_name')); ?>">Channel Name:</label>
    <input class="widefat" name="<?php echo($this->get_field_name('channel_name')); ?>"
        id="<?php echo($this->get_field_id('channel_name')); ?>" value="<?php echo esc_attr($channel_name); ?>"
        type="text" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('channel_image'); ?>">Channel Image:</label>
    <input class="widefat channel-image-url" name="<?php echo $this->get_field_name('channel_image'); ?>"
        id="<?php echo $this->get_field_id('channel_image'); ?>" value="<?php echo esc_attr($channel_image); ?>"
        type="text" />
    <button class="button select-media">Select Image</button>
</p>
<p>
    <label for="<?php echo($this->get_field_id('channel_url')); ?>">Channel URL:</label>
    <input class="widefat" name="<?php echo($this->get_field_name('channel_url')); ?>"
        id="<?php echo($this->get_field_id('channel_url')); ?>" value="<?php echo esc_attr($channel_url); ?>"
        type="text" />
</p>
<script>
jQuery(document).ready(function($) {
    $(document).on('click', '.select-media', function(e) {
        e.preventDefault();
        var button = $(this);
        var custom_uploader = wp.media({
            title: 'Select Channel Image',
            button: {
                text: 'Use this image'
            },
            multiple: false
        }).on('select', function() {
            var attachment = custom_uploader.state().get('selection').first().toJSON();
            button.prev('.channel-image-url').val(attachment.url);
        }).open();
    });
});
</script> <?php

    }

    public function update($new_instance, $old_instance){
        $instance = [];
        $instance['text'] = (!empty($new_instance['text'])) ? sanitize_text_field($new_instance['text']) : '';
        $instance['channel_name'] = (!empty($new_instance['channel_name'])) ? sanitize_text_field($new_instance['channel_name']) : '';
        $instance['channel_imge'] = (!empty($new_instance['channel_imge'])) ? sanitize_text_field($new_instance['channel_imge']) : '';
        $instance['channel_url'] = (!empty($new_instance['channel_url'])) ? sanitize_text_field($new_instance['channel_url']) : '';
        return $instance;

    }

}

?>