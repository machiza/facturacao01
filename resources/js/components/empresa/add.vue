<template>
    <div aria-hidden="true" class="onboarding-modal modal fade animated" id="onboardingFormModal" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-centered modal-dialog-centered" role="document">
          <div class="modal-content text-center">
            <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span class="close-label">Fechar</span><span class="os-icon os-icon-close"></span></button>

            <div class="onboarding-content with-gradient">
              <form>
                <div class="row">
                    <!-- <div class="col-sm-4"></div>
                    <div class="col-sm-4">
                        <div class="logged-user-w"><div class="logged-user-i"><div class="avatar-w"><img alt="" src="img/bill1.png"></div> <div class="logged-user-menu color-style-bright"><div class="logged-user-avatar-info"></div></div></div></div>
                    </div>
                    <div class="col-sm-4"></div> -->

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="">Nome</label>
                      <input class="form-control" placeholder="Insira o nome" type="text" value="">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="">Nome Curto</label>
                      <input class="form-control" placeholder="Insira o nome curto" type="text" value="">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="">Nuit</label>
                      <input class="form-control" placeholder="Insira o nuit" type="text" value="">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="">Email</label>
                      <input class="form-control" placeholder="Insira o email" type="text" value="">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="">Telemovel 1</label>
                      <input class="form-control" placeholder="Insira o telemovel 1" type="text" value="">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="">Telemovel 2</label>
                      <input class="form-control" placeholder="Insira o telemovel 2" type="text" value="">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="">Provincia</label><select class="form-control">
                        <option>
                          Maputo
                        </option>
                        <option>
                          Gaza
                        </option>
                        <option>
                          Inhambane
                        </option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="">Cidade</label><select class="form-control">
                        <option>
                          Maputo
                        </option>
                        <option>
                          Matola
                        </option>
                        <option>
                          Xai-Xai
                        </option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                        <label> Endereco</label><textarea class="form-control" rows="3"></textarea>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" data-dismiss="modal" type="button"> Cancelar</button>
                    <button class="btn btn-primary" type="button"> Salvar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {

        }
    }
</script>
