<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />



		<!-- Favicon -->
		<link rel="icon" href="./images/favicon.png" type="image/x-icon" />

		<!-- Invoice styling -->
		<style>
			body {
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				text-align: center;
				color: #777;
			}

			body h1 {
				font-weight: 300;
				margin-bottom: 0px;
				padding-bottom: 0px;
				color: #000;
			}

			body h3 {
				font-weight: 300;
				margin-top: 10px;
				margin-bottom: 20px;
				font-style: italic;
				color: #555;
			}

			body a {
				color: #06f;
			}

			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
				border-collapse: collapse;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
			}

			.invoice-box table tr.item.last td {

			}

			.invoice-box table tr.total td:nth-child(2) {
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}
		</style>
	</head>

	<body>


		<div class="invoice-box">
			<table>
				<tr class="top">
					<td colspan="5">
						<table>
                            <tr>
                                <img src="https://i.ibb.co/kQVVMwc/aa.png" alt="">
                            </tr>
							<tr>

								<td>
									Invoice SA-{{ $order['ID'] }}<br />
									Created:  {{ $order_data['created_at'] }}<br />
									Due:  {{ $order_data['created_at'] }}
								</td>

							</tr>

						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="5">
						<table>
							<tr>
								<td>
									Sparksuite, Inc.<br />
									12345 Sunny Road<br />
									Sunnyville, TX 12345
								</td>

								<td>
									Electro Ltd.<br />
									@php
                            echo ucwords($order_data['firstname'] . ' ' . $order_data['lastname']);

                        @endphp<br />
									 +{{ $order_data['phone'] }} <br> {{ $order_data['email'] }}
								</td>


							</tr>

						</table>
					</td>
				</tr>


				<tr class="heading">
					<td colspan="2">Item</td>

					<td style="margin-right: .5rem; text-align: end;">Price</td>
					<td style="margin-right: .5rem; text-align: end;">Qty</td>
					<td style="margin-right: .5rem; text-align: end;">Total</td>
				</tr>

                @foreach ($order_items as $item)
                <tr style="border-bottom: 1px solid rgb(220, 220, 220)">
                    <td colspan="2" class=" ">{{ $item->product_name }}
                        <span style="color: #{{ $item->color_code }};"> -
                            {{ $item->color_name }}</span>

                    </td>
                    <td style="text-align: end" class="sa-invoice__table-column--type--price">${{ $item->product_price }}.00
                    </td>
                    <td style="text-align: end" class="sa-invoice__table-column--type--quantity">{{ $item->quantity }}</td>
                    <td style="text-align: end" class="sa-invoice__table-column--type--total">
                        ${{ number_format($item->quantity * $item->product_price) }}.00</td>
                </tr>
            @endforeach

            <tr>
                <td colspan="2" style="text-align: start" class="sa-invoice__table-column--type--header" colSpan="4">Subtotal</td>
                <td class="sa-invoice__table-column--type--total">
                    ${{ number_format($order_data['total_amount']) }}.00</td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: start" class="sa-invoice__table-column--type--header" colSpan="4">Ship (VAT 1%)</td>
                <td class="sa-invoice__table-column--type--total">
                    ${{ number_format($order_data['shipping_price']) }}.00</td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: start" class="sa-invoice__table-column--type--header" colSpan="4">Discount</td>
                <td class="sa-invoice__table-column--type--total">-$0.00</td>
            </tr>


                <tr style=" border-top: 1px solid gray">
                    <td colspan="2" style="text-align: start" class="sa-invoice__table-column--type--header" colSpan="4">Total</td>
                    <td class="sa-invoice__table-column--type--total">${{ number_format($order_data['shipping_price'] + $order_data['total_amount']) }}.00</td>
                </tr>
			</table>
		</div>
	</body>
</html>
