import { useEffect, useState } from 'react';
import { Target, Eye, Users, TrendingUp, Award, Building2 } from 'lucide-react';
import { Card, CardContent, CardHeader, CardTitle } from '../components/ui/card';
import { Badge } from '../components/ui/badge';

export function About() {
  const [heroVisible, setHeroVisible] = useState(false);

  useEffect(() => {
    const t = setTimeout(() => setHeroVisible(true), 100);
    return () => clearTimeout(t);
  }, []);

  const values = [
    { icon: Target,   title: 'Integrity',  description: 'We uphold the highest standards of honesty and transparency' },
    { icon: Users,    title: 'Community',  description: 'We strengthen our community through mutual support' },
    { icon: TrendingUp, title: 'Growth',   description: 'We foster financial growth for all our members' },
    { icon: Award,    title: 'Excellence', description: 'We deliver exceptional service and value' },
  ];

  const board = [
    { name: 'John Smith',    position: 'Chairman',      photo: 'https://images.unsplash.com/photo-1560250097-0b93528c311a?w=400' },
    { name: 'Maria Garcia',  position: 'Vice Chairman', photo: 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=400' },
    { name: 'Robert Johnson',position: 'Treasurer',     photo: 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=400' },
    { name: 'Lisa Chen',     position: 'Secretary',     photo: 'https://images.unsplash.com/photo-1580489944761-15a19d654956?w=400' },
  ];

  const history = [
    { year: '2001', title: 'Foundation',            desc: 'Community Cooperative was founded by 50 visionary members who believed in the power of cooperation to transform lives and strengthen communities.' },
    { year: '2010', title: 'Growth & Expansion',    desc: 'Reached 5,000 members and opened our second branch, expanding our services to serve more communities and offering new financial products.' },
    { year: '2020', title: 'Digital Transformation',desc: 'Launched digital banking services and mobile app, making it easier than ever for members to access their accounts and manage their finances.' },
    { year: '2026', title: 'Today',                 desc: 'Proudly serving over 10,000 members with ₱50M+ in assets, continuing our mission to empower our community through cooperative banking.' },
  ];

  return (
    <div className="flex flex-col">

      {/* ── Hero ── */}
      <section className="relative text-white py-24 sm:py-36 overflow-hidden">
        <div
          className="absolute inset-0 bg-[url('/src/images/bghd.jpg')] bg-cover bg-center"
          style={{ transition: 'transform 20s linear', transform: heroVisible ? 'scale(1)' : 'scale(1.05)' }}
        />
        <div className="absolute inset-0 bg-gradient-to-br from-black/70 via-primary/60 to-black/70" />
        <div className="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <Badge className="mb-4 bg-white/20 text-white border-white/30 backdrop-blur-sm">Our Story</Badge>
          <h1 className="text-5xl sm:text-6xl font-bold mb-6 leading-tight">About Us</h1>
          <p className="text-xl text-blue-100 max-w-3xl leading-relaxed">
            Building a stronger community through cooperative banking since 2001
          </p>
        </div>
      </section>

      {/* ── Vision & Mission ── */}
      <section className="relative py-20 sm:py-28 overflow-hidden">
        <div className="absolute inset-0 bg-[url('/src/images/bghd.jpg')] bg-cover bg-center opacity-5" />
        <div className="absolute inset-0 bg-background/95" />
        <div className="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="grid md:grid-cols-2 gap-8">
            <Card className="rounded-2xl border-border/50 bg-card/90 backdrop-blur-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
              <CardHeader>
                <div className="w-14 h-14 rounded-xl bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center mb-4 shadow-lg">
                  <Eye className="w-7 h-7 text-white" />
                </div>
                <CardTitle className="text-xl">Our Vision</CardTitle>
              </CardHeader>
              <CardContent>
                <p className="text-muted-foreground leading-relaxed">
                  To be the leading community cooperative, empowering members through innovative financial solutions
                  and fostering sustainable economic development for generations to come.
                </p>
              </CardContent>
            </Card>

            <Card className="rounded-2xl border-border/50 bg-card/90 backdrop-blur-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
              <CardHeader>
                <div className="w-14 h-14 rounded-xl bg-gradient-to-br from-purple-500 to-purple-600 flex items-center justify-center mb-4 shadow-lg">
                  <Target className="w-7 h-7 text-white" />
                </div>
                <CardTitle className="text-xl">Our Mission</CardTitle>
              </CardHeader>
              <CardContent>
                <p className="text-muted-foreground leading-relaxed">
                  To provide accessible, member-focused financial services that promote economic well-being,
                  strengthen community bonds, and create lasting value through cooperative principles.
                </p>
              </CardContent>
            </Card>
          </div>
        </div>
      </section>

      {/* ── History ── */}
      <section className="relative py-20 sm:py-28 overflow-hidden">
        <div className="absolute inset-0 bg-[url('/src/images/bghd.jpg')] bg-cover bg-center" />
        <div className="absolute inset-0 bg-black/75" />
        <div className="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
          <h2 className="text-3xl sm:text-4xl font-bold mb-10 text-center text-white">Our History</h2>
          <Card className="rounded-2xl bg-white/10 border-white/20 backdrop-blur-md">
            <CardContent className="p-8 space-y-8">
              {history.map((item, i) => (
                <div key={i} className="flex gap-5">
                  <div className="flex-shrink-0 w-20 h-20 rounded-xl bg-gradient-to-br from-primary to-secondary flex items-center justify-center text-white font-bold text-lg shadow-lg">
                    {item.year}
                  </div>
                  <div className="pt-1">
                    <h3 className="font-semibold mb-2 text-white">{item.title}</h3>
                    <p className="text-sm text-white/70 leading-relaxed">{item.desc}</p>
                  </div>
                </div>
              ))}
            </CardContent>
          </Card>
        </div>
      </section>

      {/* ── Core Values ── */}
      <section className="relative py-20 sm:py-28 overflow-hidden">
        <div className="absolute inset-0 bg-[url('/src/images/bghd.jpg')] bg-cover bg-center opacity-5" />
        <div className="absolute inset-0 bg-background/95" />
        <div className="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <h2 className="text-3xl sm:text-4xl font-bold mb-10 text-center">Our Core Values</h2>
          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            {values.map((value, index) => (
              <Card key={index} className="rounded-2xl border-border/50 text-center bg-card/90 backdrop-blur-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
                <CardContent className="p-7">
                  <div className="w-14 h-14 rounded-xl bg-gradient-to-br from-primary to-secondary flex items-center justify-center mb-4 shadow-lg mx-auto">
                    <value.icon className="w-7 h-7 text-white" />
                  </div>
                  <h3 className="font-semibold mb-2 text-base">{value.title}</h3>
                  <p className="text-sm text-muted-foreground">{value.description}</p>
                </CardContent>
              </Card>
            ))}
          </div>
        </div>
      </section>
{/* ── Testimonials ── */}
<section className="relative py-20 sm:py-28 overflow-hidden">
  {/* Background Image */}
  <div className="absolute inset-0 bg-[url('/src/images/bghd.jpg')] bg-cover bg-center" />

  {/* Dark Overlay */}
  <div className="absolute inset-0 bg-black/70" />

  <div className="relative z-10 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
    <h2 className="text-3xl sm:text-4xl font-bold mb-10 text-center text-white">
      What Our Members Say
    </h2>

    <div className="grid md:grid-cols-3 gap-6">
      {[
        {
          name: "Ana Lopez",
          feedback:
            "This cooperative helped me grow my small business through affordable loans and excellent support.",
        },
        {
          name: "Michael Cruz",
          feedback:
            "Their digital services make managing my savings easy and convenient.",
        },
        {
          name: "Sofia Reyes",
          feedback:
            "I truly feel valued as a member. The service is always friendly and professional.",
        },
      ].map((item, index) => (
        <Card
          key={index}
          className="rounded-2xl bg-white/10 border-white/20 backdrop-blur-md hover:bg-white/20 transition-all duration-300"
        >
          <CardContent className="p-6 text-white">
            <p className="mb-4 italic text-white/80">
              “{item.feedback}”
            </p>
            <h4 className="font-semibold">{item.name}</h4>
          </CardContent>
        </Card>
      ))}
    </div>
  </div>
</section>
      {/* ── Organizational Structure ── */}
      <section className="relative py-20 sm:py-28 overflow-hidden">
        <div className="absolute inset-0 bg-[url('/src/images/bghd.jpg')] bg-cover bg-center opacity-10" />
        <div className="absolute inset-0 bg-background/95" />

        <div className="relative z-10 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
          <h2 className="text-3xl sm:text-4xl font-bold mb-12 text-center">
            Organizational Structure
          </h2>

          <div className="space-y-8">

            <Card className="rounded-2xl border-border/50 bg-card/90 backdrop-blur-sm">
              <CardContent className="p-8 text-center">
                <h3 className="font-semibold text-lg mb-2">General Assembly</h3>
                <p className="text-muted-foreground text-sm">
                  The highest governing body composed of all cooperative members.
                  Responsible for major decisions and policy approvals.
                </p>
              </CardContent>
            </Card>

            <Card className="rounded-2xl border-border/50 bg-card/90 backdrop-blur-sm">
              <CardContent className="p-8 text-center">
                <h3 className="font-semibold text-lg mb-2">Board of Directors</h3>
                <p className="text-muted-foreground text-sm">
                  Provides strategic leadership, policy direction, and ensures
                  the cooperative operates according to its mission and vision.
                </p>
              </CardContent>
            </Card>

            <div className="grid md:grid-cols-2 gap-6">
              <Card className="rounded-2xl border-border/50 bg-card/90 backdrop-blur-sm">
                <CardContent className="p-6 text-center">
                  <h3 className="font-semibold mb-2">Management Team</h3>
                  <p className="text-muted-foreground text-sm">
                    Oversees daily operations, financial management,
                    and implementation of board policies.
                  </p>
                </CardContent>
              </Card>

              <Card className="rounded-2xl border-border/50 bg-card/90 backdrop-blur-sm">
                <CardContent className="p-6 text-center">
                  <h3 className="font-semibold mb-2">Operational Staff</h3>
                  <p className="text-muted-foreground text-sm">
                    Handles member services, loan processing,
                    transactions, and administrative functions.
                  </p>
                </CardContent>
              </Card>
            </div>

          </div>
        </div>
      </section>

      {/* ── Board Members ── */}
      <section className="relative py-20 sm:py-28 overflow-hidden">
        <div className="absolute inset-0 bg-[url('/src/images/bghd.jpg')] bg-cover bg-center" />
        <div className="absolute inset-0 bg-black/75" />
        <div className="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <h2 className="text-3xl sm:text-4xl font-bold mb-10 text-center text-white">Board of Directors</h2>
          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            {board.map((member, index) => (
              <Card key={index} className="rounded-2xl bg-white/10 border-white/20 backdrop-blur-md overflow-hidden hover:bg-white/15 transition-all duration-300 hover:-translate-y-1">
                <div className="aspect-square overflow-hidden">
                  <img src={member.photo} alt={member.name} className="w-full h-full object-cover" />
                </div>
                <CardContent className="p-5 text-center">
                  <h3 className="font-semibold mb-1 text-white">{member.name}</h3>
                  <p className="text-sm text-white/65">{member.position}</p>
                </CardContent>
              </Card>
            ))}
          </div>
        </div>
      </section>

    </div>
  );
}