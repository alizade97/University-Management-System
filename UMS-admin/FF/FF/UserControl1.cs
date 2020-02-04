using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Drawing;
using System.Data;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using MySql.Data.MySqlClient;
using MySqlConnector;
namespace FF
{
    public partial class UserControl1 : UserControl
    {
        public UserControl1()
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
      
        private void UserControl1_Load(object sender, EventArgs e)
        {
           
    }

        private void button1_Click(object sender, EventArgs e)
        {
            db_connection();
            String queryStr = "INSERT INTO teacher (name,surname,email,mobile,username,password) VALUES('" + textBox1.Text + "' ,'" + textBox2.Text + "' ,'" + textBox3.Text + "' ,'" + textBox4.Text + "' ,'" + textBox5.Text + "' ,'" + textBox6.Text + "');";
                                               

            MySqlCommand cmd = new MySqlCommand(queryStr, connect);
            cmd.ExecuteNonQuery();

           
            connect.Close();

            MessageBox.Show("Data saved");
        }
    }
}
