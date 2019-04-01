<template>
    <div aria-hidden="true" class="onboarding-modal modal fade animated" id="addPerfil" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-centered modal-dialog-centered" role="document">
          <div class="modal-content text-center">
            <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span class="close-label">Fechar</span><span class="os-icon os-icon-close"></span></button>

            <div class="onboarding-content with-gradient">
              <h4 class="onboarding-title">
                Adicionar novo Perfil
              </h4>
              <form @submit.prevent="editmode ? updatePerfil() : createPerfil()">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <input v-model="form.nome" class="form-control" :class="{ 'is-invalid':form.errors.has('nome')}" name="nome"
                            placeholder="Nome" type="text" value="">
                            <has-error :form="form" field="nome"></has-error>
                        </div>
                    </div>

                    <div class="col-sm-6 mb-2">
                        <div class="form-check">
                            <label class="form-check-label"><input class="form-check-input" type="checkbox">Adicionar Empresa</label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label"><input class="form-check-input" type="checkbox">Editar Empresa</label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label"><input class="form-check-input" type="checkbox">Remover Empresa</label>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-check">
                            <label class="form-check-label"><input class="form-check-input" type="checkbox">Adicionar Utilizador</label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label"><input class="form-check-input" type="checkbox">Editar Utilizador</label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label"><input class="form-check-input" type="checkbox">Remover Utilizador</label>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-check">
                            <label class="form-check-label"><input class="form-check-input" type="checkbox">Adicionar Perfil</label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label"><input class="form-check-input" type="checkbox">Editar Perfil</label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label"><input class="form-check-input" type="checkbox">Remover Perfil</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" data-dismiss="modal" type="button"> Cancelar</button>
                    <button v-show="editmode" class="btn btn-success" type="submit"> Actualizar</button>
                    <button v-show="!editmode" class="btn btn-primary" type="submit"> Salvar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                perfies: [],
                editmode: false,
                form: new Form({
                    id: '',
                    nome: '',
                    previlegios: '',
                    descricao: '',
                    created_at: ''
                })
            }
        },
        methods: {
            // populaPerfies() {
            //     axios.get("api/perfies")
            //         .then((res) => {
            //             this.perfies = res.data;
            //         });
            // },
            updatePerfil(id) {
                this.$Progress.start();
                this.form.put('api/perfies/'+this.form.id)
                    .then(() => {
                        Fire.$emit('perfil-updated');

                        toast.fire({
                            type: 'success',
                            title: 'Perfil Actualizado com Sucesso!'
                        })

                        this.$Progress.finish();
                    })
                    .catch(() => {
                        this.$Progress.fail();
                        swal.fire("Falho!", "Havia algo errado.", "warning");
                    });
            },
            createPerfil() {
                this.$Progress.start();
                this.form.post('api/perfies')
                    .then((res) => {
                        Fire.$emit('perfil-added', res.data)

                        toast.fire({
                            type: 'success',
                            title: 'Perfil Salvo com sucesso!'
                        })

                        this.$Progress.finish();
                    })
                    .catch(() => {
                        this.$Progress.fail();
                        swal.fire("Falho!", "Havia algo errado.", "warning");
                    });
            }
        },
        created() {
            Fire.$on('perfil-deleted', id => {
                swal.fire({
                    title: 'Você tem certeza?',
                    text: "Você não poderá reverter isso!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sim, remover isso!'
                }).then((result) => {
                    if (result.value) {
                        this.form.delete('api/perfies/'+id)
                        .then(() => {
                            swal.fire(
                                'Removido!',
                                'Perfil foi removido.',
                                'success'
                            )
                            Fire.$emit('perfil-deleted-done');
                        }).catch(()=> {
                            swal.fire("Falhou!", "Algo esta errado.", "warning");
                        });
                    }
                })
            });

            Fire.$on('newModalPerfil', () => {
                this.editmode = false;
                this.form.reset();
            });

            Fire.$on('editModalPerfil', () => {
                this.editmode = true;
                this.form.reset();
            });

            Fire.$on('editModalPerfilFill', Perfil => {
                this.form.reset();
                this.form.fill(Perfil);
            });
        },
        mounted() {
            // this.populaPerfies();
        }
    }
</script>
