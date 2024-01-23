[{$smarty.block.parent}]

<tr>
    <td class="edittext" style="vertical-align: top">
        <label for="importmultilang">[{oxmultilang ident="D3_MULTILANG_CLEARTMP_IMPORT"}]</label>
    </td>
    <td class="edittext" style="vertical-align: top;">
        <input type="hidden" name="importmultilang" value="0">
        <input onClick="deselect_combineditem();" type="checkbox" id="importmultilang" value="1" class="edittext" name="importmultilang" [{if $importMultilang}]checked[{/if}][{$readonly}] [{if $blDevMode}]disabled [{/if}]>
    </td>
</tr>