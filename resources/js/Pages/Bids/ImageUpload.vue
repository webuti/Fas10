<template>
    <div>
        <file-pond :allow-multiple="true"

                   v-on:updatefiles="handleFilePondUpdateFile"
                   accepted-file-types="image/jpeg, image/png" name="files"
        />

    </div>
</template>

<script>
    import vueFilePond, {setOptions} from "vue-filepond";
    import "filepond/dist/filepond.min.css";
    import "filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css";

    import FilePondPluginImagePreview from "filepond-plugin-image-preview";

    const FilePond = vueFilePond(
        FilePondPluginImagePreview
    );

    export default {
        name: "ImageUpload",
        data() {
            return {
                myFiles: []
            }
        },
        methods: {
            handleFilePondUpdateFile(files) {

                let myFiles = [];
                Object.values(files).forEach(fl => {
                    myFiles.push(fl.file.name);
                });

                this.$emit('imageLoaded', myFiles);

            }
        },

        created() {

            setOptions({
                credits: false,
                server: {
                    url: route('image.upload.post'),
                    process: {
                        headers: {
                            "X-CSRF-Token": this.$page.props.csrf,
                        }
                    }
                },
            });

        },
        components: {
            FilePond

        }
    }
</script>

<style scoped>

</style>
