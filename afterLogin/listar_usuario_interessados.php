<?php
include_once "../conexao/conexao.php";
//consultar no banco de dados
$result_usuario = "SELECT * FROM tb_usuario ORDER BY instit DESC";
$resultado_usuario = mysqli_query($conecta, $result_usuario);


//Verificar se encontrou resultado na tabela "usuarios"
if(($resultado_usuario) AND ($resultado_usuario->num_rows != 0)){
	?>
	<table class="table table-striped" cellspacing="0" cellpadding="0">
		<thead>
			<tr>
				<th>Nome</th>
				<th>E-mail</th>
				<th>cpf_cnpj</th>
				<th>Data de Nascimento</th>
				<th>Sexo</th>
				<th>Estado Civil</th>
				<th>Telefone Fixo</th>
				<th>Ação</th>
				</tr>
		</thead>
		<tbody>
			<?php
			while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){
				?>
				<tr>
					<th><?php echo $row_usuario['nomeUsuario_nomeFantasia']; ?></th>
					<td><?php echo $row_usuario['email']; ?></td>
					<td><?php echo $row_usuario['cpf_cnpj']; ?></td>
					<td><?php echo $row_usuario['dataNascimento']; ?></td>
					<td><?php echo $row_usuario['sexo']; ?></td>
					<td><?php echo $row_usuario['estadoCivil']; ?></td>
					<td><?php echo $row_usuario['telefoneFixo']; ?></td>
					<td class="actions">
						<a class="btn btn-success btn-xs" cellspacing="0" cellpadding="0" href="view.html">Visualizar</a>
						<a class="btn btn-warning btn-xs" cellspacing="0" cellpadding="0" href="edit.html">Editar</a>
					</td>
					</tr>
				<?php
			}?>
		</tbody>
	</table>
<?php
}else{
	echo "<div class='alert alert-danger' role='alert'>Nenhum usuário encontrado!</div>";
}
