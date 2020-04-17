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
    import auth from '../../contants/auth';
    import importNomina from '../../api/importNomina';

    export default {
        name: "ImportFormNomina",
        data() {
            return {
             success: false,
              errors: null,
               files: [],
               successMessage: '',
               successData: null
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
                for ( var i = 0; i < this.files.length; i++ ) {
                    formData.append('files[' + i + ']', this.files[i]);
                }

                /*
                  Make the request to the POST /select-files URL
                */
                console.log('importNomina', importNomina);
                try {
                    this.successData = importNomina.store(formData);

                } catch (e) {
                    if(err.response.data.message === unAuthenticatedMessage) {
                        window.location = auth.LOGIN_URL
                    }
                    this.errors = err.response.data;

                    console.log('FAILURE!!');
                }
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
