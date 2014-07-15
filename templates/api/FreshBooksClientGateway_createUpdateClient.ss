<?xml version="1.0" encoding="utf-8"?>
<request method="{$GatewayName}.{$MethodName}">
	<% if $Args.Client %>
		<% with $Args.Client %>
			<client>
				<% if $ClientID %><client_id>$ClientID</client_id><% end_if %>
				<% if $FirstName %><first_name>$FirstName</first_name><% end_if %>
				<% if $LastName %><last_name>$LastName</last_name><% end_if %>
				<% if $Organization %><organization>$Organization</organization><% end_if %>
				<% if $Email %><email>$Email</email><% end_if %>
				<% if $Username %><username>$Username</username><% end_if %>
				<% if $Password %><password>$Password</password><% end_if %>
				<% if $WorkPhone %><work_phone>$WorkPhone</work_phone><% end_if %>
				<% if $HomePhone %><home_phone>$HomePhone</home_phone><% end_if %>
				<% if $Mobile %><mobile>$Mobile</mobile><% end_if %>
				<% if $Fax %><fax>$Fax</fax><% end_if %>
				<% if $Language %><language>$Language</language><% end_if %>
				<% if $CurrencyCode %><currency_code>$CurrencyCode</currency_code><% end_if %>
				<% if $Notes %><notes>$Notes</notes><% end_if %>
				<% if $PrimaryAddressStreet1 %><p_street1>$PrimaryAddressStreet1</p_street1><% end_if %>
				<% if $PrimaryAddressStreet2 %><p_street2>$PrimaryAddressStreet2</p_street2><% end_if %>
				<% if $PrimaryAddressCity %><p_city>$PrimaryAddressCity</p_city><% end_if %>
				<% if $PrimaryAddressState %><p_state>$PrimaryAddressState</p_state><% end_if %>
				<% if $PrimaryAddressCountry %><p_country>$PrimaryAddressCountry</p_country><% end_if %>
				<% if $PrimaryAddressCode %><p_code>$PrimaryAddressCode</p_code><% end_if %>
				<% if $SecondaryAddressStreet1 %><s_street1>$SecondaryAddressStreet1</s_street1><% end_if %>
				<% if $SecondaryAddressStreet2 %><s_street2>$SecondaryAddressStreet2</s_street2><% end_if %>
				<% if $SecondaryAddressCity %><s_city>$SecondaryAddressCity</s_city><% end_if %>
				<% if $SecondaryAddressState %><s_state>$SecondaryAddressState</s_state><% end_if %>
				<% if $SecondaryAddressCountry %><s_country>$SecondaryAddressCountry</s_country><% end_if %>
				<% if $SecondaryAddressCode %><s_code>$SecondaryAddressCode</s_code><% end_if %>
				<% if $VatName %><vat_name>$VatName</vat_name><% end_if %>
				<% if $VatNumber %><vat_number>$VatNumber</vat_number><% end_if %>

				<% if $Contacts %>
					<contacts>
						<% loop $Contacts %>
							<contact>
								<% if $Username %><username>$Username</username><% end_if %>
								<% if $FirstName %><first_name>$FirstName</first_name><% end_if %>
								<% if $LastName %><last_name>$LastName</last_name><% end_if %>
								<% if $Email %><email>$Email</email><% end_if %>
								<% if $Phone1 %><phone1>$Phone1</phone1><% end_if %>
								<% if $Phone2 %><phone2>$Phone2</phone2><% end_if %>
							</contact>
						<% end_loop %>
					</contacts>
				<% end_if %>
			</client>
		<% end_with %>
	<% end_if %>
</request>