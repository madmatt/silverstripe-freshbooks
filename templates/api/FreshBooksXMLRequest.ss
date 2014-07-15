<?xml version="1.0" encoding="utf-8"?>
<request method="{$GatewayName}.{$MethodName}">
	<% if $Args %>
		<% loop $Args %>
			<{$Key}>$Value</{$Key}>
		<% end_loop %>
	<% end_if %>
</request>