<form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
    <input type="hidden" name="cmd" value="_s-xclick">
    <input type="hidden" name="hosted_button_id" value="<?= $rows[0]['button_id']; ?>">
        <table class="sizes-select">
            <tr><td class="text-left"><input type="hidden" name="on0" value="Sizes">Sizes</td></tr><tr><td><select name="os0">
                        <option value="Small">Small £50.00 GBP</option>
                        <option value="Medium">Medium £70.00 GBP</option>
                        <option value="Large">Large £130.00 GBP</option>
                    </select>
                </td>
                <td class="size-link-wrap">
                    <a class="size-link" data-toggle="modal" data-target="#myModal">SIZE GUIDE</a>
                </td>
            </tr>
        </table>
<p data-toggle="collapse" data-target="#details" class="info text-left">DETAILS</p>
    <ul class="collapse text-left" id="details">
        <li>limited edition of 50</li>
        <li>unframed</li>
        <li>printed in London England</li>
    </ul>
    <p data-toggle="collapse" data-target="#delivery" class="text-left info">DELIVERY & RETURNS</p>
    <ul id="delivery" class="text-left collapse">
        <li>free worldwide shipping on orders over £50.00</li>
        <li>Your order will be dispatched within 1-14 days depending on your order</li>
        <li>Returns and exchanges are accepted within 14 days - see our full policy <a href="delivery"><strong>here</strong></a>.</li>
    </ul>
    <input type="hidden" name="currency_code" value="GBP">
    <input type="image" src="http://lntlondon.com/img/add-to-cart.jpg" border="0" name="submit" alt="PayPal – The safer, easier way to pay online!">
    <img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
</form>