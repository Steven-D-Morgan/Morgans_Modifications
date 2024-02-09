Create redirect for non-firewall NTP lookups
Navigate to Firewall > NAT and select Port Forward

Interface: VL10_MGMT
Protocol: UDP
Source: VL10_MGMT net
Source port range:
From: Any
To: Any
Destination:
Invert Match: 
Source: VL10_MGMT address
Destination target port range:
From: NTP
To: NTP
Redirect target IP: 127.0.0.1
Redirect target port: NTP
Description: VL10_MGMT: NTP redirect
No XMLRPC Sync: 
NAT reflection: Use system default
Filter rule association: Add associated filter rule
Save & Apply
Create redirect for non-firewall DNS lookups
Click Add

Disabled: 
no RDR (NOT): 
Interface: VL10_MGMT
Protocol: TCP/UDP
Source: VL10_MGMT net
Source port range:
From: Any
To: Any
Destination:
Invert Match: 
Source: VL10_MGMT address
Destination target port range:
From: DNS
To: DNS
Redirect target IP: 127.0.0.1
Redirect target port: DNS
Description: VL10_MGMT: DNS redirect
No XMLRPC Sync: 
NAT reflection: Use system default
Filter rule association: Add associated filter rule
Save & Apply
Navigate back to Firewall > Rules and select VL10_MGMT.
You should see two rules created for the redirects for NTP and DNS at the bottom. Now lets create the remaining rules for this subnet.

Create allow local traffic from management interface to all other subnets rule.
Click ‘↴+’ icon
Action: Pass
Disabled: 
Interface: VL10_MGMT
Address Family: IPv4
Protocol: TCP/UDP
Source: VL10_MGMT net
Destination:
- Invert Match : 
- Single Host or alias: LOCAL_SUBNETS
Destination Port Range:
- From: Other
- Custom: Allowed_OUT_Ports_LAN
- To: Other
- Custom: Allowed_OUT_Ports_LAN
Log: 
Description: VL10_MGMT: Allow traffic to local subnets
