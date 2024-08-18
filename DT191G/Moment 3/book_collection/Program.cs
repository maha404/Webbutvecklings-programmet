using book_collection.Data;
using Microsoft.EntityFrameworkCore;

var builder = WebApplication.CreateBuilder(args);
builder.Services.AddControllersWithViews(); // MVC

// Databas
builder.Services.AddDbContext<BookContext> (options => 
    options.UseSqlite(builder.Configuration.GetConnectionString("DefaultDbString"))
);

var app = builder.Build();

app.UseStaticFiles(); // wwwroot
app.UseRouting();

// Routing
app.MapControllerRoute(
    name: "default",
    pattern: "{controller=Book}/{action=Index}/{id?}"
);

app.Run();
