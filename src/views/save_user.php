<main class="content">
    <?php
        renderTitle(
            'Cadastro de usuário',
            'Crie e atualize o usuário',
            'icofont-user'
        );

        include(TEMPLATE_PATH . "/messages.php");
    ?>
    
    <form action="#" method="post">
        <input type="hidden" name="id" value="<?= $id ?>">
        <div class="form-row">
          <div class="form-group col-md-6">
              <label for="name">Nome</label>
              <input type="text" name="name" id="name" placeholder="Nome" class="form-control 
              <?= isset($erros['name']) ? 'is-invalid' : '' ?>"
              value="<?= $name?>">
              <div class="invalid-feedback">
                  <?= $erros['name']?>
              </div>
          </div>  
          <div class="form-group col-md-6">
              <label for="email">E-mail</label>
              <input type="email" name="email" id="email" placeholder="email" class="form-control 
              <?= isset($erros['email']) ? 'is-invalid' : '' ?>"
              value="<?= $email?>">
              <div class="invalid-feedback">
                  <?= $erros['email']?>
              </div>
          </div>  
          <div class="form-group col-md-6">
              <label for="password">Senha</label>
              <input type="password" name="password" id="password" placeholder="Senha" class="form-control 
              <?= isset($erros['password']) ? 'is-invalid' : '' ?>">
              <div class="invalid-feedback">
                  <?= $erros['password']?>
              </div>
          </div>  
          <div class="form-group col-md-6">
              <label for="confirm_password">Confirme a senha</label>
              <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirme a senha" class="form-control 
              <?= isset($erros['confirm_password']) ? 'is-invalid' : '' ?>">
              <div class="invalid-feedback">
                  <?= $erros['confirm_password']?>
              </div>
          </div>  
          <div class="form-group col-md-6">
              <label for="start_date">Início</label>
              <input type="date" name="start_date" id="start_date" class="form-control 
              <?= isset($erros['start_date']) ? 'is-invalid' : '' ?>"
              value="<?= $start_date?>">
              <div class="invalid-feedback">
                  <?= $erros['start_date']?>
              </div>
          </div>  
          <div class="form-group col-md-6">
              <label for="end_date">Desligamento</label>
              <input type="date" name="end_date" id="end_date" class="form-control 
              <?= isset($erros['end_date']) ? 'is-invalid' : '' ?>"
              value="<?= $end_date?>">
              <div class="invalid-feedback">
                  <?= $erros['end_date']?>
              </div>
          </div>  
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
              <label for="is_admin">Administrador?</label>
              <input type="checkbox" name="is_admin" id="is_admin" class="form-control 
              <?= isset($erros['is_admin']) ? 'is-invalid' : '' ?>"
              <?= isset($is_admin) ? 'checked' : '' ?> >
              <div class="invalid-feedback">
                  <?= $erros['is_admin']?>
              </div>
          </div>  
        </div>

        <div>
            <button class="btn btn-primary btn-lg">Salvar</button>
            <a href="/users.php" class="btn btn-secondary btn-lg">Cancelar</a>
        </div>
        
    </form>
</main>