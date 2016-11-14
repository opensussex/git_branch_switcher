<script>

</script>

<h2>Git Branches</h2>
<p>
    select a branch to switch to:
</p>
<form ic-post-to="/home/branch">
<select id="branches" name="branches">
<? foreach($view_vars['branches'] as $branch): ?>
    <option value="<?=$branch?>"><?=$branch?></option>
<? endforeach; ?>
</select>
<input type="checkbox" name="migration" value="true">Run migration<br>
<input type="submit">
</form>
