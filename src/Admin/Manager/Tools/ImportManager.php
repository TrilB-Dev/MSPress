<?php
/**
 * ImportManager class for MSPress plugin.
 * @package MSPress
 * @subpackage Admin\Manager\Tools
 * @since 1.0.0
 */
namespace MSPress\Admin\Manager\Tools;

use MSPress\Admin\Manager\Manager;
use MSPress\Includes\Functions\Helpers\FormFieldHelper;
use MSPress\Includes\Functions\Helpers\UrlHelper;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

final class ImportManager extends Manager {
    /**
     * Render the JSON import form below the tools settings form.
     *
     * @return void
     */
    public function render(): void {
        ?>
        <form
            method="post"
            action="<?php echo esc_url( UrlHelper::admin_action( 'mspress_import' ) ); ?>"
            enctype="multipart/form-data"
            class="card mspress-import-form shadow-sm mt-4"
        >
            <?php echo wp_kses_post( FormFieldHelper::input( 'action', 'mspress_import', [ 'type' => 'hidden' ] ) ); ?>
            <?php wp_nonce_field( 'mspress_import' ); ?>
            <div class="card-body">
                <?php
                echo wp_kses_post(
                    FormFieldHelper::label(
                        'mspress-import-file',
                        __( 'Import Graph Core JSON', 'mspress' ),
                        [
                            'description' => __( 'Select a JSON export containing Microsoft Graph Core settings.', 'mspress' ),
                            'tooltip' => __( 'Import adds or updates the exported settings while preserving local secrets and unrelated settings.', 'mspress' ),
                            'tooltip_icon' => 'fa-file-import',
                        ]
                    )
                );
                echo wp_kses_post(
                    FormFieldHelper::input(
                        'mspress_import_file',
                        '',
                        [
                            'id' => 'mspress-import-file',
                            'type' => 'file',
                            'class' => 'mb-3',
                            'accept' => 'application/json,.json',
                            'required' => true,
                        ]
                    )
                );
                echo wp_kses_post(
                    FormFieldHelper::button(
                        __( 'Import JSON', 'mspress' ),
                        [
                            'type' => 'submit',
                            'class' => 'btn-primary',
                        ]
                    )
                );
                ?>
            </div>
        </form>
        <?php
    }
}