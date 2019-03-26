<template>
    <div aria-hidden="true" class="onboarding-modal modal fade animated" id="addEmpresa" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-centered modal-dialog-centered" role="document">
          <div class="modal-content text-center">
            <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span class="close-label">Fechar</span><span class="os-icon os-icon-close"></span></button>

            <div class="onboarding-content with-gradient">
              <h4 class="onboarding-title">
                Adicionar nova Empresa
              </h4>
              <form @submit.prevent="editmode ? updateEmpresa() : createEmpresa()">
                <div class="row">
                    <!-- <div class="col-sm-4"></div>
                    <div class="col-sm-4">
                        <div class="logged-user-w"><div class="logged-user-i"><div class="avatar-w"><img alt="" src="img/bill1.png"></div> <div class="logged-user-menu color-style-bright"><div class="logged-user-avatar-info"></div></div></div></div>
                    </div>
                    <div class="col-sm-4"></div> -->

                  <div class="col-sm-6">
                    <div class="form-group">
                      <!-- <label for="">Nome</label> -->
                      <input v-model="form.nome" class="form-control" :class="{ 'is-invalid':form.errors.has('nome')}" name="nome"
                      placeholder="Nome" type="text" value="">
                      <has-error :form="form" field="nome"></has-error>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <!-- <label for="">Nome Curto</label> -->
                      <input v-model="form.nomeCurto" class="form-control" :class="{ 'is-invalid':form.errors.has('nomeCurto')}" name="nomeCurto"
                      placeholder="Nome Curto" type="text" value="">
                      <has-error :form="form" field="nomeCurto"></has-error>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <!-- <label for="">Nuit</label> -->
                      <input v-model="form.nuit" class="form-control" :class="{ 'is-invalid':form.errors.has('nuit')}" name="nuit"
                      placeholder="Nuit" type="text" value="">
                      <has-error :form="form" field="nuit"></has-error>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <!-- <label for="">Email</label> -->
                      <input v-model="form.email" class="form-control" :class="{ 'is-invalid':form.errors.has('email')}" name="email"
                      placeholder="Email" type="email" value="">
                      <has-error :form="form" field="email"></has-error>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <!-- <label for="">Telemovel 1</label> -->
                      <input v-model="form.telemovel1" class="form-control" :class="{ 'is-invalid':form.errors.has('telemovel1')}" name="telemovel1"
                      placeholder="Telemovel 1" type="text" value="">
                      <has-error :form="form" field="telemovel1"></has-error>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <!-- <label for="">Telemovel 2</label> -->
                      <input v-model="form.telemovel2" class="form-control" :class="{ 'is-invalid':form.errors.has('telemovel2')}" name="telemovel2"
                      placeholder="Telemovel 2" type="text" value="">
                      <has-error :form="form" field="telemovel2"></has-error>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <!-- <label for="">Provincia</label> -->
                      <select v-model="form.provincia" class="form-control"
                      :class="{ 'is-invalid':form.errors.has('provincia')}" name="provincia">
                        <option selected disabled>Selecione Provincia</option>
                        <option>Maputo</option>
                        <option>Gaza</option>
                        <option>Inhambane</option>
                      </select>
                      <has-error :form="form" field="provincia"></has-error>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <!-- <label for="">Cidade</label> -->
                      <select v-model="form.cidade" class="form-control" :class="{ 'is-invalid':form.errors.has('cidade')}" name="cidade">
                        <option selected disabled>Selecione Cidade</option>
                        <option>Maputo</option>
                        <option>Matola</option>
                        <option>Xai-Xai</option>
                      </select>
                      <has-error :form="form" field="cidade"></has-error>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                        <!-- <label> Endereco</label> -->
                        <textarea v-model="form.endereco" class="form-control"
                        :class="{ 'is-invalid':form.errors.has('endereco')}"
                        name="endereco" rows="3" placeholder="Endereco"></textarea>
                        <has-error :form="form" field="endereco"></has-error>
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
                editmode: false,
                form: new Form({
                    id: '',
                    nome: '',
                    nomeCurto: '',
                    nuit: '',
                    email: '',
                    telemovel1: '',
                    telemovel2: '',
                    provincia: 'Selecione Provincia',
                    cidade: 'Selecione Cidade',
                    endereco: '',
                })
            }
        },
        methods: {
            updateEmpresa(id) {
                this.$Progress.start();
                this.form.put('api/empresas/'+this.form.id)
                    .then(() => {
                        Fire.$emit('empresa-updated');

                        toast.fire({
                            type: 'success',
                            title: 'Empresa Actualizada com Sucesso!'
                        })

                        this.$Progress.finish();
                    })
                    .catch(() => {
                        this.$Progress.fail();
                        swal.fire("Falho!", "Havia algo errado.", "warning");
                    });
            },
            createEmpresa() {
                this.$Progress.start();
                this.form.post('api/empresas')
                    .then((res) => {
                        Fire.$emit('empresa-added', res.data)

                        toast.fire({
                            type: 'success',
                            title: 'Empresa Salva com sucesso!'
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
            Fire.$on('empresa-deleted', id => {
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
                        this.form.delete('api/empresas/'+id)
                        .then(() => {
                            swal.fire(
                                'Removido!',
                                'Empresa foi removida.',
                                'success'
                            )
                            Fire.$emit('empresa-deleted-done');
                        }).catch(()=> {
                            swal.fire("Falhou!", "Algo esta errado.", "warning");
                        });
                    }
                })
            });

            Fire.$on('newModalEmpresa', () => {
                this.editmode = false;
                this.form.reset();
            });

            Fire.$on('editModalEmpresa', () => {
                this.editmode = true;
                this.form.reset();
            });

            Fire.$on('editModalEmpresaFill', empresa => {
                this.form.reset();
                this.form.fill(empresa);
            });
        },
        mounted() {

        }
    }
</script>
