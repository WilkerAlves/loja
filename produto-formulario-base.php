                <tr>
                    <td>NOME:</td>
                    <td><input type="text" name="nome" class="form-control" value="<?=$produto['nome']?>"/></td>    
                </tr>
                <tr>
                    <td>PREÇO:</td>
                    <td><input type="number" step="0.5" name="preco"  class="form-control" value="<?=$produto['preco']?>"/></td>
                </tr>
                <tr>
                    <td>DESCRIÇÃO:</td>
                    <td><textarea name="descricao" class="form-control"><?=$produto['descricao']?></textarea></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="checkbox" name="usado" <?=$usado?> value="true">Usado
                    </td>
                </tr>
                <tr>
                    <td>CATEGORIAS:</td>
                    <td>
                            <select name="categoria_id" class="form-control">
                                <?php foreach($categorias as $categoria):
                                    $essaEhACategoria = $produto['categoria_id'] == $categoria['id'];
                                    $selecao = $essaEhACategoria ? "selected='selected'" : "";
                                ?>
                                        <option value="<?=$categoria['id']?>" <?=$selecao?>>
                                            <?=$categoria['nome']?>
                                        </option>
                                <?php endforeach?>
                            </select>
                    </td>
                </tr>
