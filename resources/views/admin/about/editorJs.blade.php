<script>
    DecoupledEditor
        .create(document.querySelector('#editor'), {
                ckfinder: {uploadUrl: '{{route('admin.posts.upload').'?_token='.csrf_token()}}',
            }
        })
        .then(editor => {
            const toolbarContainer = document.querySelector('.toolbar-container');

            toolbarContainer.prepend(editor.ui.view.toolbar.element);

            window.editor = editor;
        })
        .catch(err => {
            console.error(err.stack);
        });

    function clearEditor() {
        var editor = DecoupledEditor.instances[0];
        editor.setData('');
    }
</script>