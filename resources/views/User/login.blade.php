<form method="post">
	{{csrf_field()}}
	<table>
		<tr>
			<td>Email: </td>
			<td>
				<input type="text" name="email"> <br/>
			</td>
		</tr>
		<tr>
			<td>Mot de Passe: </td>
			<td>
				<input type="password" name="pass"> <br/>
			</td>
		</tr>
		<tr>
			<td>
				<input type="submit" value="Se connecter">
			</td>
		</tr>
	</table>

	
</form>