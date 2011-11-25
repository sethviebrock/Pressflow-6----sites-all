<form action="/home?destination=node%2F151" accept-charset="UTF-8" method="post" id="user-login-form">
	<div>
	  <?php print drupal_render($form['create_link']); ?>
	  <table>
		  <tbody>
        <tr>
	      	<td><label for="edit-name" style="display: inline;">Username:</label></td>
		      <td><?php print drupal_render($form['name']); ?></td>
		      <td rowspan="2"><div id="user-login-button">
	            <?php print drupal_render($form['submit']); ?>
	          </div>
        </td>
	      </tr>
	      <tr>
	        <td><label for="edit-pass-wrapper" style="display: inline;">Password:</label></td>
		      <td><?php print drupal_render($form['pass']); ?></td>
	      </tr>
    	</tbody>
    </table>

	  <?php print drupal_render($form['reset_password_link']); ?>
	  <?php print drupal_render($form); ?>
	</div>
</form>
