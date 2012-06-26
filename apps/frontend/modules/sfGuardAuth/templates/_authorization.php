<?php use_helper('I18N') ?>
<?php include_stylesheets_for_form($form); ?>
<?php include_javascripts_for_form($form); ?>

<div id="autorisation">
    <form action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
    <table>
        <tbody>
            <?php foreach ($form as $widget): ?>
                <tr>
                    <td><?php echo $widget->isHidden() ? '' : $widget->renderLabel(); ?></td>
                    <td><?php echo $widget->render(); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
        <tr>
            <td colspan="2" align="center">
            <input type="image" value="Войти" src="/images/login_button.jpg" />

            <?php $routes = $sf_context->getRouting()->getRoutes() ?>
            <?php if (isset($routes['sf_guard_forgot_password'])): ?>
                <br /><a href="<?php echo url_for('@sf_guard_forgot_password') ?>"><?php echo __('Forgot your password?', null, 'sf_guard') ?></a>
            <?php endif; ?>

            <?php if (isset($routes['sf_guard_register'])): ?>
                <br /><a href="<?php echo url_for('@sf_guard_register') ?>"><?php echo __('Want to register?', null, 'sf_guard') ?></a>
            <?php endif; ?>
            </td>
        </tr>
        </tfoot>
    </table>
    </form>
</div>