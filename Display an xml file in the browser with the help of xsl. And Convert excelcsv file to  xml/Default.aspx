<%@ Page Language="C#" AutoEventWireup="true" CodeFile="Default.aspx.cs" Inherits="_Default" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
    <style type="text/css">
        .auto-style1 {
            text-align: center;
            color: #6699FF;
            font-size: xx-large;
        }
        .auto-style2 {
            text-align: center;
        }
        .auto-style3 {
            font-size: xx-large;
            color: #CC3399;
        }
    </style>
</head>
<body>
    <form id="form1" runat="server">
    <div class="auto-style1">
    
        Convert an&nbsp; csv file into an xml</div>
        <div class="auto-style2">
            <asp:Label ID="Label1" runat="server" Text="Enter File Link"></asp:Label>
            <asp:TextBox ID="TextBox1" runat="server"></asp:TextBox>
            <asp:Button ID="Button1" runat="server" OnClick="Button1_Click" Text="Generate xml" />
            <br />
            <span class="auto-style3">
            <br />
            <br />
            <br />
            <br />
            Convert an&nbsp; xml file into an csv</span><br />
            <asp:Label ID="Label2" runat="server" Text="Enter File Link"></asp:Label>
            <asp:TextBox ID="TextBox2" runat="server"></asp:TextBox>
            <asp:Button ID="Button2" runat="server" OnClick="Button2_Click" Text="Generate CSV" />
        </div>
    </form>
</body>
</html>
