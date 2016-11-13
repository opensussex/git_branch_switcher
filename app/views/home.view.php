<script>

</script>

<h1>Git Branches</h1>
<form ic-post-to="/home/branch">
<select id="branches" name="branches">
<? foreach($view_vars['branches'] as $branch): ?>
    <option value="<?=$branch?>"><?=$branch?></option>
<? endforeach; ?>
</select>
<input type="submit">
</form>
