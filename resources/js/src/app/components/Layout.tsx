import { Link, Outlet, useLocation } from "react-router";
import {
    Moon,
    Sun,
    Menu,
    X,
    Home,
    Building2,
    Users,
    Newspaper,
    Gift,
    Briefcase,
    FileText,
    Gavel,
    Info,
    Phone,
    Calculator,
    LogIn,
} from "lucide-react";
import { useTheme } from "next-themes";
import { useState, useEffect } from "react";
import { Button } from "./ui/button";

export function Layout() {
    const { theme, setTheme } = useTheme();
    const location = useLocation();
    const [mounted, setMounted] = useState(false);
    const [isMenuOpen, setIsMenuOpen] = useState(false);

    useEffect(() => {
        setMounted(true);
    }, []);

    const navigation = [
        { name: "Home", href: "/", icon: Home },
        {
            name: "Products & Services",
            href: "/products",
            icon: Building2,
            submenu: [
                { name: "Loan Types", href: "/products/loans" },
                { name: "Deposits & Savings", href: "/products/deposits" },
            ],
        },
        {
            name: "Membership",
            href: "/membership",
            icon: Users,
            submenu: [
                { name: "Regular Membership", href: "/membership/info" },
                { name: "How to Join", href: "/membership/steps" },
                {
                    name: "Classifications & Benefits",
                    href: "/membership/classifications",
                },
                { name: "Apply Now", href: "/membership/apply" },
            ],
        },
        {
            name: "What's New",
            href: "/news",
            icon: Newspaper,
            submenu: [
                { name: "News & Events", href: "/news/events" },
                { name: "Promos", href: "/news/promos" },
                { name: "Careers", href: "/news/careers" },
                { name: "Invitation to Bid", href: "/news/bidding" },
                { name: "Auction", href: "/news/auction" },
            ],
        },
        { name: "About Us", href: "/about", icon: Info },
        { name: "Contact Us", href: "/contact", icon: Phone },
        { name: "Loan Calculator", href: "/calculator", icon: Calculator },
    ];

    return (
        <div className="min-h-screen flex flex-col">
            {/* Header - solid/opaque */}
            <header className="sticky top-0 z-50 bg-background border-b border-border shadow-sm">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div className="flex justify-between items-center h-16">
                        {/* Logo */}
                        <Link to="/" className="flex items-center gap-3">
                            <div className="w-10 h-10 rounded-xl bg-gradient-to-br from-primary to-secondary flex items-center justify-center shadow-lg">
                                <Building2 className="w-6 h-6 text-white" />
                            </div>
                            <div className="hidden sm:block">
                                <span className="text-xl font-semibold bg-gradient-to-r from-primary to-secondary bg-clip-text text-transparent">
                                    CO-OP
                                </span>
                            </div>
                        </Link>

                        {/* Desktop Navigation */}
                        <nav className="hidden lg:flex items-center gap-1">
                            {navigation.map((item) => (
                                <div key={item.name} className="relative group">
                                    <Link
                                        to={item.href}
                                        className={`px-4 py-2 rounded-lg transition-all duration-200 ${
                                            location.pathname === item.href
                                                ? "bg-primary text-primary-foreground shadow-md"
                                                : "hover:bg-accent hover:text-accent-foreground"
                                        }`}
                                    >
                                        {item.name}
                                    </Link>
                                    {item.submenu && (
                                        <div className="absolute left-0 mt-1 w-56 rounded-xl bg-card/95 backdrop-blur-xl border border-border shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                                            <div className="py-2">
                                                {item.submenu.map((subitem) => (
                                                    <Link
                                                        key={subitem.name}
                                                        to={subitem.href}
                                                        className="block px-4 py-2 hover:bg-accent hover:text-accent-foreground transition-colors"
                                                    >
                                                        {subitem.name}
                                                    </Link>
                                                ))}
                                            </div>
                                        </div>
                                    )}
                                </div>
                            ))}
                        </nav>

                        {/* Theme Toggle, Login Button & Mobile Menu */}
                        <div className="flex items-center gap-2">
                            {mounted && (
                                <Button
                                    variant="ghost"
                                    size="icon"
                                    onClick={() =>
                                        setTheme(
                                            theme === "dark" ? "light" : "dark",
                                        )
                                    }
                                    className="rounded-lg"
                                >
                                    {theme === "dark" ? (
                                        <Sun className="w-5 h-5" />
                                    ) : (
                                        <Moon className="w-5 h-5" />
                                    )}
                                </Button>
                            )}

                            {/* Login Button */}
                            <Button
                                size="sm"
                                className="hidden sm:flex items-center gap-2 rounded-lg bg-gradient-to-r from-primary to-secondary text-primary-foreground shadow-md hover:shadow-lg hover:opacity-90 transition-all duration-200 font-medium"
                                onClick={() => {
                                    window.location.href = "/coop/login"; // relative – uses current domain
                                    // OR absolute if you prefer:
                                    // window.location.href = 'http://coop_management.test/coop/login';
                                }}
                            >
                                <LogIn className="w-4 h-4" />
                                <span>Member Login</span>
                            </Button>

                            <Button
                                variant="ghost"
                                size="icon"
                                className="lg:hidden rounded-lg"
                                onClick={() => setIsMenuOpen(!isMenuOpen)}
                            >
                                {isMenuOpen ? (
                                    <X className="w-5 h-5" />
                                ) : (
                                    <Menu className="w-5 h-5" />
                                )}
                            </Button>
                        </div>
                    </div>

                    {/* Mobile Navigation */}
                    {isMenuOpen && (
                        <nav className="lg:hidden py-4 space-y-1 border-t border-border/50">
                            {navigation.map((item) => (
                                <div key={item.name}>
                                    <Link
                                        to={item.href}
                                        className={`flex items-center gap-3 px-4 py-2 rounded-lg transition-all ${
                                            location.pathname === item.href
                                                ? "bg-primary text-primary-foreground"
                                                : "hover:bg-accent hover:text-accent-foreground"
                                        }`}
                                        onClick={() => setIsMenuOpen(false)}
                                    >
                                        <item.icon className="w-5 h-5" />
                                        {item.name}
                                    </Link>
                                    {item.submenu && (
                                        <div className="ml-8 mt-1 space-y-1">
                                            {item.submenu.map((subitem) => (
                                                <Link
                                                    key={subitem.name}
                                                    to={subitem.href}
                                                    className="block px-4 py-2 text-sm hover:bg-accent hover:text-accent-foreground rounded-lg transition-colors"
                                                    onClick={() =>
                                                        setIsMenuOpen(false)
                                                    }
                                                >
                                                    {subitem.name}
                                                </Link>
                                            ))}
                                        </div>
                                    )}
                                </div>
                            ))}

                            {/* Mobile Login Button */}
                            <div className="pt-2 px-4">
                                <Button
                                    size="sm"
                                    className="hidden sm:flex items-center gap-2 rounded-lg bg-gradient-to-r from-primary to-secondary text-primary-foreground shadow-md hover:shadow-lg hover:opacity-90 transition-all duration-200 font-medium"
                                    onClick={() => {
                                        window.location.href = "/coop/login"; // relative – uses current domain
                                        // OR absolute if you prefer:
                                        // window.location.href = 'http://coop_management.test/coop/login';
                                    }}
                                >
                                    <LogIn className="w-4 h-4" />
                                    <span>Member Login</span>
                                </Button>
                            </div>
                        </nav>
                    )}
                </div>
            </header>

            {/* Main Content */}
            <main className="flex-1">
                <Outlet />
            </main>

            {/* Footer */}
            <footer className="bg-gradient-to-br from-primary via-primary to-secondary text-primary-foreground">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                    <div className="grid grid-cols-1 md:grid-cols-4 gap-8">
                        {/* About Column */}
                        <div className="space-y-4">
                            <div className="flex items-center gap-3">
                                <div className="w-10 h-10 rounded-xl bg-white/20 backdrop-blur-sm flex items-center justify-center">
                                    <Building2 className="w-6 h-6" />
                                </div>
                                <span className="font-semibold">
                                    Community Cooperative
                                </span>
                            </div>
                            <p className="text-sm text-primary-foreground/80">
                                Empowering our community through financial
                                cooperation and mutual support.
                            </p>
                        </div>

                        {/* Quick Links */}
                        <div>
                            <h3 className="font-semibold mb-4">Quick Links</h3>
                            <ul className="space-y-2 text-sm">
                                <li>
                                    <Link
                                        to="/about"
                                        className="hover:underline"
                                    >
                                        About Us
                                    </Link>
                                </li>
                                <li>
                                    <Link
                                        to="/membership"
                                        className="hover:underline"
                                    >
                                        Membership
                                    </Link>
                                </li>
                                <li>
                                    <Link
                                        to="/products"
                                        className="hover:underline"
                                    >
                                        Products & Services
                                    </Link>
                                </li>
                                <li>
                                    <Link
                                        to="/calculator"
                                        className="hover:underline"
                                    >
                                        Loan Calculator
                                    </Link>
                                </li>
                            </ul>
                        </div>

                        {/* Resources */}
                        <div>
                            <h3 className="font-semibold mb-4">Resources</h3>
                            <ul className="space-y-2 text-sm">
                                <li>
                                    <Link
                                        to="/news/events"
                                        className="hover:underline"
                                    >
                                        News & Events
                                    </Link>
                                </li>
                                <li>
                                    <Link
                                        to="/news/promos"
                                        className="hover:underline"
                                    >
                                        Promos
                                    </Link>
                                </li>
                                <li>
                                    <Link
                                        to="/news/careers"
                                        className="hover:underline"
                                    >
                                        Careers
                                    </Link>
                                </li>
                                <li>
                                    <Link
                                        to="/contact"
                                        className="hover:underline"
                                    >
                                        Contact Us
                                    </Link>
                                </li>
                            </ul>
                        </div>

                        {/* Contact Info */}
                        <div>
                            <h3 className="font-semibold mb-4">Get in Touch</h3>
                            <ul className="space-y-2 text-sm text-primary-foreground/80">
                                <li>Email: info@community-coop.com</li>
                                <li>Phone: (123) 456-7890</li>
                                <li>Hours: Mon-Fri 9AM-5PM</li>
                            </ul>
                        </div>
                    </div>

                    <div className="border-t border-white/20 mt-8 pt-8 text-center text-sm text-primary-foreground/80">
                        <p>
                            &copy; 2026 Community Cooperative. All rights
                            reserved.
                        </p>
                    </div>
                </div>
            </footer>
        </div>
    );
}
