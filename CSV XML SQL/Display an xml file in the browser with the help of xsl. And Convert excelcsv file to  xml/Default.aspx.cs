using System;
using System.Collections.Generic;
using System.Data;
using System.IO;
using System.Linq;
using System.Text;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Xml.Linq;

public partial class _Default : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {

    }
    protected void Button1_Click(object sender, EventArgs e)
    {
        var lines = File.ReadAllLines(@TextBox1.Text);

        var xml = new XElement("TopElement",
           lines.Select(line => new XElement("Item",
              line.Split(';')
                  .Select((column, index) => new XElement("Column" + index, column)))));

        xml.Save(@"C:\Users\CSG50\Desktop\xmloutput.xml");

    }
    protected void Button2_Click(object sender, EventArgs e)
    {

        string xmlString = System.IO.File.ReadAllText(TextBox2.Text);

        string csvPath = "C:\\Users\\CSG50\\Desktop\\output88.csv";
        GenerateCsvFromXml(xmlString,csvPath,true);

        
    }
    const int TabSpaces = 8;
        static void GenerateCsvFromXml(string xmlString, string resultFileName, bool isTabDelimited)
        {
            XDocument xDoc = XDocument.Parse(xmlString);

            var tabsNeededList = new List<int>(); // only used for TabDelimited file

            string delimiter = isTabDelimited
                ? "\t"
                : ",";

            // Get title row 
            var titlesList = xDoc.Root
                .Elements()
                .First()
                .Elements()
                .Select(s => s.Name.LocalName)
                .ToList();

            // Get the values
            var masterValuesList = xDoc.Root
                .Elements()
                .Select(e => e
                    .Elements()
                    .Select(c => c.Value)
                    .ToList())
                .ToList();

            // Add titles as first row in master values list
            masterValuesList.Insert(0, titlesList);

            // For tab delimited, we need to figure out the number of tabs
            // needed to keep the file uniform, for each column
            if (isTabDelimited)
            {
                for (var i = 0; i < titlesList.Count; i++)
                {
                    int maxLength =
                        masterValuesList
                            .Select(vl => vl[i].Length)
                            .Max();

                    // assume tab is 4 characters
                    int rem;
                    int tabsNeeded = Math.DivRem(maxLength, TabSpaces, out rem);
                    tabsNeededList.Add(tabsNeeded);
                }
            }

            // Write the file
            using (var fs = new FileStream(resultFileName, FileMode.Create))
            using (var sw = new StreamWriter(fs))
            {
                foreach (var values in masterValuesList)
                {
                    string line = string.Empty;

                    foreach (var value in values)
                    {
                        line += value;
                        if (titlesList.IndexOf(value) < titlesList.Count - 1)
                        {
                            if (isTabDelimited)
                            {
                                int rem;
                                int tabsUsed = Math.DivRem(value.Length, TabSpaces, out rem);
                                int tabsLeft = tabsNeededList[values.IndexOf(value)] - tabsUsed + 1; // one tab is always needed!

                                for (var i = 0; i < tabsLeft; i++)
                                {
                                    line += delimiter;
                                }
                            }
                            else // comma delimited
                            {
                                line += delimiter;
                            }
                        }
                    }

                    sw.WriteLine(line);
                }
            }
         










    }
   
}