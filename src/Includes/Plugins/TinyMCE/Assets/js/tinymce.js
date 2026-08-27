(() => {
    'use strict';

    const insertMedia = (editor) => {
        if (!window.wp?.media) {
            return;
        }

        var frame = window.wp.media({
            title: window.mspressTinyMCE?.mediaTitle || '',
            button: { text: window.mspressTinyMCE?.mediaButton || '' },
            multiple: false
        });

        frame.on('select', () => {
            const attachment = frame.state().get('selection').first().toJSON();
            const url = attachment.url || '';
            if (url) {
                editor.insertContent('<img src="' + editor.dom.encode(url) + '" alt="' + editor.dom.encode(attachment.alt || attachment.title || '') + '">');
            }
        });

        frame.open();
    };

    const initialize = () => {
        if (!window.tinymce) {
            return;
        }

        document.querySelectorAll('.mspress-tinymce-config').forEach((node) => {
            const editorId = node.dataset.editor;
            if (!editorId || window.tinymce.get(editorId)) {
                return;
            }

            let settings;
            try {
                settings = JSON.parse(node.textContent || '{}');
            } catch {
                return;
            }

            settings.setup = (editor) => {
                if (settings.media_buttons) {
                    editor.ui.registry.addButton('mspressmedia', {
                        icon: 'image',
                        tooltip: window.mspressTinyMCE?.mediaTooltip || '',
                        onAction: () => insertMedia(editor)
                    });
                }
            };

            window.tinymce.init(settings);
        });
    };

    window.addEventListener('mspress:settings-tab-loaded', initialize);

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initialize);
    } else {
        initialize();
    }
})();