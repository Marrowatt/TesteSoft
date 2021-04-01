<template>
    <div>
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editando</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="#" method="POST">
                            <label for="produto">Nome do produto: </label>
                            <input type="text" name="produto" class="form-control" v-model="prod.produto">
                            <label for="produto">Valor: </label>
                            <input type="number" name="valor" class="form-control" v-model="prod.valor" step="0.01">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-primary" @click="sendToUp">Editar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            id: Number,
            prod: Object,
        },
        data () {
            return {
            }
        },
        mounted() {
        },
        methods: {
            sendToUp () {
                $('#editModal').modal('hide');
                
                this.$emit('editing', { id: this.id, prod: this.prod })
            }
        }
    }
</script>
