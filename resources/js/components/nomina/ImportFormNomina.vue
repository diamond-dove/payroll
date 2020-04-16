<template>
    <section>
        <div class="large-12 medium-12 small-12 cell">
            <label>Files
                <input type="file" id="files" ref="files" multiple v-on:change="handleFilesUpload()"/>
            </label>
        </div>
        <div class="large-12 medium-12 small-12 cell">
            <div v-for="(file, key) in files" class="file-listing">{{ file.name }} <span class="remove-file" v-on:click="removeFile( key )">Remove</span></div>
        </div>
        <br>
        <div class="large-12 medium-12 small-12 cell">
            <button class="btn btn-primary" v-on:click="addFiles">Add Files</button>
        </div>
        <br>
        <div class="large-12 medium-12 small-12 cell">
            <button class="btn btn-success" v-on:click="submitFiles">Submit</button>
        </div>
    </section>
</template>

<script>
    export default {
        name: "ImportFormNomina",
        data() {
            return {
             success: false,
              errors: null,
               files: []
            };
        },
        methods: {
            /*
               Adds a file
            */
            addFiles(){
                this.$refs.files.click();
            },

            /*
                Submits files to the server
            */
            submitFiles(){
                /*
                  Initialize the form data
                */
                let formData = new FormData();

                /*
                  Iteate over any file sent over appending the files
                  to the form data.
                */
                for( var i = 0; i < this.files.length; i++ ){
                    let file = this.files[i];
                    console.log('file', file);
                    formData.append('files[' + i + ']', file);
                }

                /*
                  Additional POST Data
                */
                formData.append('first_name', 'Dan');
                formData.append('last_name', 'Pastori');

                /*
                  Make the request to the POST /select-files URL
                */
                window.axios.post( '/api/upload-nomina-files',
                    formData,
                    {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }
                ).then(() => {
                    console.log('SUCCESS!!');
                }).catch((err) => {
                    if(err.response.data.message === 'Unauthenticated.') {
                        window.location = '/login'
                    }
                    console.log('FAILURE!!');
                });
            },

            /*
                Handles the uploading of files
            */
            handleFilesUpload() {
                let uploadedFiles = this.$refs.files.files;

                /*
                  Adds the uploaded file to the files array
                */
                for( var i = 0; i < uploadedFiles.length; i++ ){
                    this.files.push( uploadedFiles[i] );
                }
            },

            /*
              Removes a select file the user has uploaded
            */
            removeFile( key ){
                this.files.splice( key, 1 );
            }
        }
    }
</script>

<style scoped>
    input[type="file"] {
        position: absolute;
        top: -500px;
    }
    div.file-listing {
        width: 200px;
    }

    span.remove-file {
        color: red;
        cursor: pointer;
        float: right;
    }
</style>
