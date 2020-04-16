<template>
    <section id="bad-gateway">
        <div class="full">
            <div class="row bad-gateway-row">
                <div class="col-md-8">
                    <h2 class="h2-responsive mt-3 mb-2">404. Hay un error.</h2>
                    <h4>La pagina que esta buscando no se encuentra en este portal.</h4>
                </div>
                <div class="col-md-4">
                    <img alt="Error 404" class="img-fluid" src="https://mdbootstrap.com/img/Others/grafika404-bf.png"/>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        name: 'BadGateway'
    }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
    .full {
        height: 70vh;
    }
    .bad-gateway-row {
        margin: 0;
        position: absolute;
        top: 50%;
        left: 55%;
        -webkit-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }
</style>
