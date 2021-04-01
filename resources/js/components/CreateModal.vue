<template>
    <div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">Novo Produto</button>

        <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cadastrando</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="#" method="POST">
                            <label for="produto">Nome do produto: </label>
                            <input type="text" name="produto" class="form-control" v-model="produto.produto">
                            <label for="produto">Valor: </label>
                            <input type="number" name="valor" class="form-control" v-model="produto.valor" step="0.01">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-primary" @click="sendToUp()">Salvar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                produto: {
                    produto: "",
                    valor: "",
                }
            }
        },
        mounted() {
        },
        methods: {
            sendToUp () {
                $('#createModal').modal('hide');
                
                this.$emit('creating', { product: this.produto })
            }
        }
    }
</script>
