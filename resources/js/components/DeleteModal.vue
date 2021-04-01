<template>
    <div>
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Deletando</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <h3> Você está prestes a deletar um registro </h3>
                        <h2> Tem certeza disso? </h2>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                        <button type="button" class="btn btn-danger" @click="sendToUp()">Sim</button>
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
            // prod: Object,
        },
        data () {
            return {
            }
        },
        mounted() {
        },
        methods: {
            sendToUp () {
                $('#deleteModal').modal('hide');
                
                this.$emit('deleting', { id: this.id })
            }
        }
    }
</script>
