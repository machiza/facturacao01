<template>
    <div aria-hidden="true" class="onboarding-modal modal fade animated" id="addUser" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-centered modal-dialog-centered" role="document">
          <div class="modal-content text-center">
            <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span class="close-label">Fechar</span><span class="os-icon os-icon-close"></span></button>

            <div class="onboarding-content with-gradient">
              <h4 class="onboarding-title">
                Adicionar novo Utilizador
              </h4>
              <form action="/file-upload"
      class="dropzone"
      id="my-awesome-dropzone"></form>
              <form @submit.prevent="editmode ? updateUser() : createUser()">
                <div class="row">
                    <div class="col-sm-4"></div>
                        <div class="col-sm-4">

                        </div>
                    <div class="col-sm-4"></div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <input v-model="form.name" class="form-control" :class="{ 'is-invalid':form.errors.has('name')}" name="name"
                      placeholder="Nome" type="text" value="">
                      <has-error :form="form" field="name"></has-error>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input v-model="form.email" class="form-control" :class="{ 'is-invalid':form.errors.has('email')}" name="email"
                      placeholder="Email" type="email" value="">
                      <has-error :form="form" field="email"></has-error>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input v-model="form.password" class="form-control" :class="{ 'is-invalid':form.errors.has('password')}" name="password"
                      placeholder="Password" type="password" value="">
                      <has-error :form="form" field="password"></has-error>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <select v-model="form.perfil" class="form-control"
                      :class="{ 'is-invalid':form.errors.has('perfil')}" name="perfil">
                        <option selected disabled>Selecione Perfil</option>
                        <option v-for="perfil in perfies" :key="perfil.id" :value="perfil.nome">
                            {{ perfil.nome }}
                        </option>
                      </select>
                      <has-error :form="form" field="perfil"></has-error>
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
                    name: '',
                    email: '',
                    password: '',
                    perfil: 'Selecione perfil'
                })
            }
        },
        methods: {
            populaPerfies() {
                axios.get("api/perfies")
                    .then((res) => {
                        this.perfies = res.data;
                    });
            },
            updateUser(id) {
                this.$Progress.start();
                this.form.put('api/users/'+this.form.id)
                    .then(() => {
                        Fire.$emit('user-updated');

                        toast.fire({
                            type: 'success',
                            title: 'User Actualizada com Sucesso!'
                        })

                        this.$Progress.finish();
                    })
                    .catch(() => {
                        this.$Progress.fail();
                        swal.fire("Falho!", "Havia algo errado.", "warning");
                    });
            },
            createUser() {
                this.$Progress.start();
                this.form.post('api/users')
                    .then((res) => {
                        Fire.$emit('user-added', res.data)

                        toast.fire({
                            type: 'success',
                            title: 'User Salva com sucesso!'
                        })

                        this.$Progress.finish();
                        console.log(res);
                    })
                    .catch(() => {
                        this.$Progress.fail();
                        swal.fire("Falho!", "Havia algo errado.", "warning");
                    });
            }
        },
        created() {
            Fire.$on('user-deleted', id => {
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
                        this.form.delete('api/users/'+id)
                        .then(() => {
                            swal.fire(
                                'Removido!',
                                'User foi removida.',
                                'success'
                            )
                            Fire.$emit('user-deleted-done');
                        }).catch(()=> {
                            swal.fire("Falhou!", "Algo esta errado.", "warning");
                        });
                    }
                })
            });

            Fire.$on('newModalUser', () => {
                this.editmode = false;
                this.form.reset();
            });

            Fire.$on('editModalUser', () => {
                this.editmode = true;
                this.form.reset();
            });

            Fire.$on('editModalUserFill', User => {
                this.form.reset();
                console.log(User);
                this.form.fill(User);
                this.form.perfil = User.perfies[0].nome
                console.log(User.perfies[0]);
            });
        },
        mounted() {
            this.populaPerfies();
        }
    }
</script>
