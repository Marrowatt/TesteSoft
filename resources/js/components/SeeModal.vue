<template>
    <div>
        <div class="modal fade" id="seeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Visualizando</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="#" method="POST">
                            <label for="produto">Nome do produto: </label>
                            <input type="text" name="produto" class="form-control" :value="prod.produto">
                            <label for="produto">Valor: </label>
                            <input type="number" name="valor" class="form-control" :value="prod.valor" step="0.01">
                            <label for="dataCadastro">Quando foi cadastrado: </label>
                            <input type="text" name="dataCadastro" class="form-control" :value="prod.dataCadastro">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            // id: Number,
            prod: Object,
        },
        data () {
            return {
            }
        },
        mounted() {
        },
        methods: {
        }
    }
</script>
