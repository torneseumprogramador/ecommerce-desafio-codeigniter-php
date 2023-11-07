<?= $this->extend('Layouts/application') ?>

<?= $this->section('title') ?>
    Home
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <section>
        <div>
            <h1 style="margin-bottom:10px">Bem-vindo ao Curso Básico de CodeIgniter</h1>
            <div>Ministrado por Danilo do Torne-se um Programador</div>
        </div>

        <h1>Resumo do Curso</h1>
        <p>
            Este curso foi projetado para ensinar os fundamentos do framework CodeIgniter 4 aos iniciantes. 
            Com uma abordagem prática, os alunos irão aprender como configurar o ambiente de desenvolvimento, 
            criar estruturas MVC e desenvolver aplicações web dinâmicas e eficientes.
        </p>
        <p>
            Acompanhe as aulas gravadas e materiais de apoio através do nosso 
            <a href="https://www.torneseumprogramador.com.br/cursos/desafio_php" target="_blank">site oficial</a>.
        </p>

    </section>
<?= $this->endSection() ?>