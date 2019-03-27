<template>
    <div aria-hidden="true" class="onboarding-modal modal fade animated show-on-load" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-centered" role="document">
          <div class="modal-content text-center">
            <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span class="close-label">Skip Intro</span><span class="os-icon os-icon-close"></span></button>
            <div class="onboarding-slider-w">
              <div class="onboarding-slide">
                <div class="onboarding-media">
                  <!-- <img alt="" src="img/bigicon2.png" width="200px"> -->
                </div>
                <div class="onboarding-content with-gradient">
                  <h4 class="onboarding-title">
                    Detalhes da Empresa!
                  </h4>
                  <form @submit.prevent="editmode ? updateEmpresa() : createEmpresa()">
                <div class="row">
                    <!-- <div class="col-sm-4"></div>
                    <div class="col-sm-4">
                        <div class="logged-user-w"><div class="logged-user-i"><div class="avatar-w"><img alt="" src="img/bill1.png"></div> <div class="logged-user-menu color-style-bright"><div class="logged-user-avatar-info"></div></div></div></div>
                    </div>
                    <div class="col-sm-4"></div> -->
                    <!-- <input name="id" value="{{ Auth::user()->id }}"> -->

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
                <!-- <div class="modal-footer">
                    <button class="btn btn-danger" data-dismiss="modal" type="button"> Cancelar</button>
                    <button v-show="editmode" class="btn btn-success" type="submit"> Actualizar</button>
                    <button v-show="!editmode" class="btn btn-primary" type="submit"> Salvar</button>
                </div> -->
              </form>
                </div>
              </div>
              <div class="onboarding-slide">
                <div class="onboarding-media">
                  <img alt="" src="img/bigicon5.png" width="200px">
                </div>
                <div class="onboarding-content with-gradient">
                  <h4 class="onboarding-title">
                    Example Request Information
                  </h4>
                  <div class="onboarding-text">
                    In this example you can see a form where you can request some additional information from the customer when they land on the app page.
                  </div>
                  <form>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="">Your Full Name</label><input class="form-control" placeholder="Enter your full name..." type="text" value="">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="">Your Role</label><select class="form-control">
                            <option>
                              Web Developerselected has-sub-menu
                            </option>
                            <option>
                              Business Owner
                            </option>
                            <option>
                              Other
                            </option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="onboarding-slide">
                <div class="onboarding-media">selected has-sub-menu
                  <img alt="" src="img/bigicon6.png" width="200px">
                </div>
                <div class="onboarding-content with-gradient">
                  <h4 class="onboarding-title">
                    Showcase App Features
                  </h4>
                  <div class="onboarding-text">
                    In this example you can showcase some of the features of your application, it is very handy to make new users aware of your hidden features. You can use boostrap columns to split them up.
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <ul class="features-list">
                        <li>
                          Fully Responsive design
                        </li>
                        <li>
                          Pre-built app layouts
                        </li>
                        <li>
                          Incredible Flexibility
                        </li>
                      </ul>
                    </div>
                    <div class="col-sm-6">
                      <ul class="features-list">
                        <li>
                          Boxed & Full Layouts
                        </li>
                        <li>
                          Based on Bootstrap 4
                        </li>
                        <li>
                          Developer Friendly
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
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
                userName: '',
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
            fillEmpresa() {
                axios.get("api/empresas/"+this.$userId)
                    .then((res) => {
                        this.form.fill(res.data);
                        // console.log(res);
                    });
            }
        },
        mounted() {
            this.fillEmpresa();
        }
    }
</script>
