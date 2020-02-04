using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using MySql.Data.MySqlClient;
using MySqlConnector;
namespace FF
{
    public partial class Form2 : Form
    {
        public Form2()
        {
            InitializeComponent();
        }
        private string conn;
        private MySqlConnection connect;
        private void db_connection()
        {
            try
            {
                conn = "Server=localhost;Database=ums;Uid=root;Pwd=;";
                connect = new MySqlConnection(conn);
                connect.Open();
            }
            catch (MySqlException e)
            {
                MessageBox.Show("error to connect");
            }
        }
        private void button2_Click(object sender, EventArgs e)
        {
            this.Close();
          
        }

        private void label1_Click(object sender, EventArgs e)
        {

        }

        private void panel3_Paint(object sender, PaintEventArgs e)
        {

        }

        

        private void timer1_Tick_1(object sender, EventArgs e)
        {
            timer1.Start();
            DateTime d = DateTime.Now;
            label1.Text = d.ToShortDateString() + "  " + d.ToLongTimeString();
        }

        private void button7_Click(object sender, EventArgs e)
        {
          
        }

        private void button1_Click(object sender, EventArgs e)
        {
            
        }

        private void button7_Click_1(object sender, EventArgs e)
        {
            
        }

        private void Form2_Load(object sender, EventArgs e)
        {
            //flowLayoutPanel2.Visible = false;
            flowLayoutPanel3.Visible = false;
            panel3.Controls.Clear();
        }

        private void button8_Click(object sender, EventArgs e)
        {
            panel3.Controls.Clear();
            panel3.Controls.Add(user1);
         


          /*  if (flowLayoutPanel2.Visible == true)
            {
                flowLayoutPanel2.Visible = false;
            }
            else
            {
                flowLayoutPanel2.Visible = true;
            }*/
        }

        private void button4_Click(object sender, EventArgs e)
        {
            panel3.Controls.Clear();
            if (flowLayoutPanel3.Visible == true)
            {
                flowLayoutPanel3.Visible = false;
            }
            else
            {
                flowLayoutPanel3.Visible = true;
            }
        }

        private void button9_Click(object sender, EventArgs e)
        {
            Form1 f = new Form1();
            this.Hide();
            f.Show();
            //userControl11.TextBox1Value();
        }

        private void userControl11_Load(object sender, EventArgs e)
        {
            
        }

        private void button1_Click_1(object sender, EventArgs e)
        {
            panel3.Controls.Clear();
            //panel3.Controls.Add(userControl11);
            
        }

        private void button3_Click(object sender, EventArgs e)
        {
            panel3.Controls.Clear();
           // panel3.Controls.Add(userControl21);
        }

        private void button6_Click(object sender, EventArgs e)
        {
            panel3.Controls.Clear();
            panel3.Controls.Add(department1);
        }

        private void button5_Click(object sender, EventArgs e)
        {
            panel3.Controls.Clear();
          panel3.Controls.Add(division1);
        }

        private void userControl41_Load(object sender, EventArgs e)
        {

        }

        private void user1_Load(object sender, EventArgs e)
        {

        }

        private void department1_Load(object sender, EventArgs e)
        {

        }

        private void button1_Click_2(object sender, EventArgs e)
        {
            panel3.Controls.Clear();
            panel3.Controls.Add(course1);
        }

        private void button3_Click_1(object sender, EventArgs e)
        {
            panel3.Controls.Clear();
            panel3.Controls.Add(classcontrol11);
        }

        private void button7_Click_2(object sender, EventArgs e)
        {
            panel3.Controls.Clear();
        }
    }
}
