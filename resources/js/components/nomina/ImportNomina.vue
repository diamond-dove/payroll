<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Importe su nomina</div>
                    <div class="card-body">
                        <import-form-nomina></import-form-nomina>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import ImportFormNomina from './ImportFormNomina'
    export default {
        name: "ImportNomina",
        components: {
            ImportFormNomina
        }
    }
</script>

<style scoped>

</style>
