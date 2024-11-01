<?php
/*
Copyright 2010  Lee Thompson (email: sr.mysql.dba@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


function register_mysettings() {
        register_setting( 'wpww_feeds', 'Woot' );
        register_setting( 'wpww_feeds', 'kids' );
        register_setting( 'wpww_feeds', 'shirt' );
        register_setting( 'wpww_feeds', 'wine' );
        register_setting( 'wpww_feeds', 'sellout' );
}

function draw_form(){
	$myvariable = get_option('wpww_feeds');
	$checked_feeds = explode(',',$myvariable);
?>
<div class="wrap">
<h2>Woot Watcher Admin</h2>
Select the Woot's you would like to watch.<br>
<form method="post" action="<?php echo $PHP_SELF; ?>">
    <?php settings_fields( 'wpww_feeds' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Woot</th>
        <td><input type="checkbox" name="wpww[]" value="Woot" <?php if (in_array('Woot',$checked_feeds)) { echo "checked=\"checked\""; } ?>/></td>
        </tr>

        <tr valign="top">
        <th scope="row">Kids Woot</th>
        <td><input type="checkbox" name="wpww[]" value="kids" <?php if (in_array('kids',$checked_feeds)) { echo "checked=\"checked\""; } ?>/></td>
        </tr>

        <tr valign="top">
        <th scope="row">Shirt Woot</th>
        <td><input type="checkbox" name="wpww[]" value="shirt" <?php if (in_array('shirt',$checked_feeds)) { echo "checked=\"checked\""; } ?>/></td>
        </tr>

        <tr valign="top">
        <th scope="row">Wine Woot</th>
        <td><input type="checkbox" name="wpww[]" value="wine" <?php if (in_array('wine',$checked_feeds)) { echo "checked=\"checked\""; } ?>/></td>
        </tr>

        <tr valign="top">
        <th scope="row">Sellout</th>
        <td><input type="checkbox" name="wpww[]" value="sellout" <?php if (in_array('sellout',$checked_feeds)) { echo "checked=\"checked\""; } ?>/></td>
        </tr>
        <tr valign="top">
        <th scope="row">Tech</th>
        <td><input type="checkbox" name="wpww[]" value="tech" <?php if (in_array('sellout',$checked_feeds)) { echo "checked=\"checked\""; } ?>/></td>
        </tr>
        <tr valign="top">
        <th scope="row">Home</th>
        <td><input type="checkbox" name="wpww[]" value="home" <?php if (in_array('sellout',$checked_feeds)) { echo "checked=\"checked\""; } ?>/></td>
        </tr>
    </table>

    <p class="submit">
    <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
    </p>

</form>
</div>
<div class="wrap">
Donations are accepted for continued development of Wordpress Woot Watcher. Thank you.<br>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="9K2JJMPESJWT2">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
</div>

<?php
}

if(isset($_POST['wpww']))
{
        echo "<div class=\"updated\">Woot Watcher has been updated.</div>";
        $myvariable="";
        $myseperator="";
        foreach ( $_POST["wpww"] as $v) {
                if (!isset($nofirstcomma)) $nofirstcomma=0; else $myseperator=",";
                        $myvariable = $myvariable.$myseperator.$v;
        }
update_option('wpww_feeds', $myvariable);
draw_form();
}
else{
draw_form();
}
?>
